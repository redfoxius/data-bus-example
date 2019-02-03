<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\FibonacciQueueListener;

if (PHP_SAPI !== 'cli') {
    exit;
}

$a = new FibonacciQueueListener();
$a->run();