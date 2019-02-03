<?php
namespace App;


class FibonacciNumberGenerator extends NumberGenerator
{
    private $first  = 1;
    private $second = 1;

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
        switch ($n) {
            case 1:
                return $this->first;
            case 2:
                return $this->second;
            default:
                $next         = $this->first + $this->second;
                $this->first  = $this->second;
                $this->second = $next;
                return $next;
        }
        // return round(pow((sqrt(5)+1)/2, $n) / sqrt(5));
    }
}