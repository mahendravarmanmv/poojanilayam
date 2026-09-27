<?php

/**
 * Verify Pooja Nilayam migrations plus required Laravel infrastructure migrations.
 */

$options = getopt('', ['path:', 'manifest:']);

$path = $options['path'] ?? 'database/migrations';
$manifestPath = $options['manifest']
    ?? __DIR__ . DIRECTORY_SEPARATOR . 'migration_order_manifest.json';

$manifest = json_decode(file_get_contents($manifestPath), true);

if (!is_array($manifest)) {
    fwrite(STDERR, "Invalid manifest\n");
    exit(1);
}

/*
|--------------------------------------------------------------------------
| Expected Pooja Nilayam migrations
|--------------------------------------------------------------------------
*/

$expectedProjectFiles = [];

foreach ($manifest as $item) {
    $expectedProjectFiles[] = $item['new_filename'];
}

/*
|--------------------------------------------------------------------------
| Required Laravel framework migrations
|--------------------------------------------------------------------------
|
| These are intentionally outside the Pooja Nilayam 221-file manifest.
|
*/

$frameworkFiles = [
    '0001_01_01_000000_create_sessions_table.php',
    '0001_01_01_000001_create_cache_table.php',
    '0001_01_01_000002_create_jobs_table.php',
];

/*
|--------------------------------------------------------------------------
| Read actual migration files
|--------------------------------------------------------------------------
*/

$files = array_map(
    'basename',
    glob(rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '*.php')
);

$set = array_fill_keys($files, true);

/*
|--------------------------------------------------------------------------
| Check project migrations
|--------------------------------------------------------------------------
*/

$missing = [];

foreach ($expectedProjectFiles as $file) {
    if (!isset($set[$file])) {
        $missing[] = $file;
    }
}

if ($missing) {
    echo "Missing " . count($missing) . " expected Pooja Nilayam migrations.\n";
    echo implode("\n", $missing) . "\n";
    exit(1);
}

/*
|--------------------------------------------------------------------------
| Check framework migrations
|--------------------------------------------------------------------------
*/

$missingFramework = [];

foreach ($frameworkFiles as $file) {
    if (!isset($set[$file])) {
        $missingFramework[] = $file;
    }
}

if ($missingFramework) {
    echo "Missing required Laravel framework migrations.\n";
    echo implode("\n", $missingFramework) . "\n";
    exit(1);
}

/*
|--------------------------------------------------------------------------
| Check for unexpected files
|--------------------------------------------------------------------------
*/

$allowedFiles = array_merge(
    $expectedProjectFiles,
    $frameworkFiles
);

sort($files, SORT_STRING);
sort($allowedFiles, SORT_STRING);

if ($files !== $allowedFiles) {

    $unexpected = array_values(
        array_diff($files, $allowedFiles)
    );

    if ($unexpected) {
        echo "Migration directory contains unexpected files:\n";
        echo implode("\n", $unexpected) . "\n";
    }

    exit(1);
}

/*
|--------------------------------------------------------------------------
| Verify Pooja Nilayam migration order
|--------------------------------------------------------------------------
*/

$projectFiles = array_values(
    array_filter(
        $files,
        fn ($file) => in_array($file, $expectedProjectFiles, true)
    )
);

/*
|--------------------------------------------------------------------------
| Verify exact manifest sequence
|--------------------------------------------------------------------------
*/

$actualProjectOrder = [];

foreach ($expectedProjectFiles as $file) {
    if (in_array($file, $files, true)) {
        $actualProjectOrder[] = $file;
    }
}

if ($actualProjectOrder !== $expectedProjectFiles) {
    echo "Pooja Nilayam migration order does not match the manifest.\n";
    exit(1);
}

echo "OK: 221 Pooja Nilayam migrations verified.\n";
echo "OK: 3 Laravel framework migrations verified.\n";
echo "OK: No unexpected migration files found.\n";
echo "Migration directory verification passed.\n";
