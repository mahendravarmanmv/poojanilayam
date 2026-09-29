<?php

return [
    // Temporary checkout reservation. Payment confirmation remains a separate phase.
    'slot_lock_minutes' => (int) env('BOOKING_SLOT_LOCK_MINUTES', 15),
];
