<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\FibonacciQueueListener;

if (PHP_SAPI !== 'cli') {
    exit;
}

$child_pid = pcntl_fork();
if ($child_pid) {
    // end parent process
    exit();
}
// set child process as main
posix_setsid();

$a = new FibonacciQueueListener();
$a->run();