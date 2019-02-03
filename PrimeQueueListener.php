<?php
namespace App;


class PrimeQueueListener extends QueueListener
{
    public function __construct()
    {
        parent::__construct();

        $this->channelName = 'Prime';
        $this->counterName = 'count_prime';
    }

    protected function processChannelMessage($redisIns, $channel, $msg)
    {
        $this->updateQuery(intval($msg), $this->counterName);
    }
}