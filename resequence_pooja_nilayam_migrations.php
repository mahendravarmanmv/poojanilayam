<?php
/**
 * Pooja Nilayam migration filename resequencer.
 *
 * Default: DRY RUN only.
 * Apply: php resequence_pooja_nilayam_migrations.php --path=database/migrations --apply
 * Optional: --manifest=/path/to/migration_order_manifest.json
 */

$options = getopt('', ['path:', 'manifest:', 'apply']);
$path = $options['path'] ?? 'database/migrations';
$manifestPath = $options['manifest'] ?? __DIR__ . DIRECTORY_SEPARATOR . 'migration_order_manifest.json';
$apply = array_key_exists('apply', $options);

if (!is_dir($path)) {
    fwrite(STDERR, "Migration directory not found: {$path}\n");
    exit(1);
}
if (!is_file($manifestPath)) {
    fwrite(STDERR, "Manifest not found: {$manifestPath}\n");
    exit(1);
}

$manifest = json_decode(file_get_contents($manifestPath), true);
if (!is_array($manifest) || count($manifest) !== 221) {
    fwrite(STDERR, "Invalid manifest. Expected 221 active migrations.\n");
    exit(1);
}

// Safety: Batch 29 duplicate vendor/inventory migrations must not be present.
$files = array_map('basename', glob(rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '*.php'));
foreach ($files as $file) {
    if (preg_match('/^2026_09_25_29\d{4}_/', $file)) {
        fwrite(STDERR, "Batch 29 duplicate migration detected: {$file}\n");
        fwrite(STDERR, "Remove the Batch 29 duplicate files before continuing.\n");
        exit(1);
    }
}

$existing = array_fill_keys($files, true);
$missing = [];
$targets = [];
foreach ($manifest as $item) {
    $old = $item['old_filename'];
    $new = $item['new_filename'];
    if (!isset($existing[$old])) {
        $missing[] = $old;
    }
    if (isset($targets[$new])) {
        fwrite(STDERR, "Duplicate target filename: {$new}\n");
        exit(1);
    }
    $targets[$new] = true;
}
if ($missing) {
    fwrite(STDERR, "Missing migration files:\n" . implode("\n", $missing) . "\n");
    fwrite(STDERR, "No changes were made.\n");
    exit(1);
}

foreach ($manifest as $item) {
    $target = $path . DIRECTORY_SEPARATOR . $item['new_filename'];
    if (is_file($target) && $item['old_filename'] !== $item['new_filename']) {
        fwrite(STDERR, "Target already exists: {$target}\n");
        fwrite(STDERR, "No changes were made.\n");
        exit(1);
    }
}

foreach ($manifest as $item) {
    echo sprintf("%03d | Batch %02d | %s -> %s\n", $item['order'], $item['batch'], $item['old_filename'], $item['new_filename']);
}

if (!$apply) {
    echo "\nDRY RUN complete. No files changed.\n";
    echo "Add --apply only after confirming the migration database has not already been executed, or after reconciling the migrations table.\n";
    exit(0);
}

// Two-pass rename prevents collisions while changing many filenames.
$tempMap = [];
foreach ($manifest as $i => $item) {
    $oldPath = $path . DIRECTORY_SEPARATOR . $item['old_filename'];
    $tmpName = '__pn_migration_tmp_' . str_pad((string)($i + 1), 4, '0', STR_PAD_LEFT) . '.php';
    $tmpPath = $path . DIRECTORY_SEPARATOR . $tmpName;
    if (!rename($oldPath, $tmpPath)) {
        fwrite(STDERR, "Failed to move {$oldPath} to {$tmpPath}\n");
        exit(1);
    }
    $tempMap[] = [$tmpPath, $path . DIRECTORY_SEPARATOR . $item['new_filename']];
}
foreach ($tempMap as [$tmpPath, $newPath]) {
    if (!rename($tmpPath, $newPath)) {
        fwrite(STDERR, "Failed to finalize {$newPath}\n");
        exit(1);
    }
}

echo "\nMigration filenames resequenced successfully.\n";
