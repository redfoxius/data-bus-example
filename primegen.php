<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\PrimeNumberGenerator;

/*$options = getopt("count:delay:");
if (!isset($options['count']) || intval($options['count']) < 1) {
    echo 'Wrong param value: -count. It must be number > 0 like: -count=1000';
    die();
}
if (!isset($options['delay']) || intval($options['delay']) < 0) {
    echo 'Wrong param value: -delay. It must be number of seconds >= 0 like: -delay=5';
    die();
}

$a = new PrimeNumberGenerator(intval($options['count']), intval($options['delay']));*/
$a = new PrimeNumberGenerator(20, 1);
$a->run();