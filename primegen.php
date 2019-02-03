<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\PrimeNumberGenerator;

if (PHP_SAPI !== 'cli') {
    exit;
}

$options = getopt("c:d:");
if (!isset($options['c']) || intval($options['c']) < 1) {
    echo 'Wrong param value count: -c. It must be number > 0 like: -c 100' . PHP_EOL;
    die();
}
if (!isset($options['d']) || intval($options['d']) < 0) {
    echo 'Wrong param value delay: -d. It must be number of micro seconds >= 0 like: -d 500' . PHP_EOL;
    die();
}

$a = new PrimeNumberGenerator(intval($options['c']), intval($options['d']));
$a->run();
