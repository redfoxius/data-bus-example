<?php
namespace App;

abstract class NumberGenerator
{
    use RedisConnector;

    protected $channelName     = null;
    protected $cyclesMaxCount  = 0;
    protected $currentCycle    = 1;
    protected $delay           = 0;

    public function __construct($cyclesCount = null, $delay = null)
    {
        $this->cyclesMaxCount = !empty($cyclesCount) ? $cyclesCount : 0;
        $this->delay          = !empty($delay) ? $delay : 0;

        self::connectRedis();
    }

    public function __destruct()
    {
        self::disconnectRedis();
    }

    private function sendMesage($message)
    {
        self::$redis->publish($this->channelName, $message);
    }

    private function generateNext()
    {
        if ($this->currentCycle > $this->cyclesMaxCount) {
            return false;
        }

        $number = $this->getNextNumber();
        if ($number !== false) {
            $this->sendMesage($number);
            $this->currentCycle++;
            return true;
        }

        return false;
    }

    public function run()
    {
        do {
            sleep($this->delay);
        } while ($this->generateNext());

        echo 'Finished!';
    }

    protected abstract function getNextNumber();
}