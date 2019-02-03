<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\PrimeQueueListener;

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

$a = new PrimeQueueListener();
$a->run();