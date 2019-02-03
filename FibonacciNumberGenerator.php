<?php
namespace App;


class FibonacciNumberGenerator extends NumberGenerator
{
    public function __construct($cyclesCount = null, $delay = null)
    {
        parent::__construct($cyclesCount, $delay);

        $this->channelName = 'Fibonacci';
    }

    protected function getNextNumber()
    {
        return $this->getFibonacci($this->currentCycle);
    }

    private function getFibonacci($n)
    {
        return round(pow((sqrt(5)+1)/2, $n) / sqrt(5));
    }
}