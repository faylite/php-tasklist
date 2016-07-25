<?php

// Create a constant for the root directory
define('ROOT_DIR', __DIR__ . '/../');

// Composer auto-loader
require __DIR__ . '/../bootstrap/App.php';

$app->run();
