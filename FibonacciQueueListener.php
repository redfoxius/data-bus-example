<?php
namespace App;


class FibonacciQueueListener extends QueueListener
{
    public function __construct()
    {
        parent::__construct();

        $this->channelName = 'Fibonacci';
        $this->counterName = 'count_fib';
    }

    public function processChannelMessage($redisIns, $channel, $msg)
    {
        $this->updateQuery(intval($msg), $this->counterName);
    }
}