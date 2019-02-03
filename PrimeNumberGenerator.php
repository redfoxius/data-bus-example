<?php
namespace App;


class PrimeNumberGenerator extends NumberGenerator
{
    private $lastFoundPrime = 1;

    public function __construct($cyclesCount = null, $delay = null)
    {
        parent::__construct($cyclesCount, $delay);

        $this->channelName = 'Prime';
    }

    protected function getNextNumber()
    {
        $this->lastFoundPrime = $this->getNextPrime();
        return $this->lastFoundPrime;
    }

    private function getNextPrime()
    {
        /**
         * Bertrand's postulate (actually a theorem) states that if n > 3 is an integer, then there always exists
         * at least one prime number p with n < p < 2n − 2. A weaker but more elegant formulation is: for every n > 1
         * there is always at least one prime p such that n < p < 2n.
         */
        for ($i = $this->lastFoundPrime + 1; $i <= 2 * $this->lastFoundPrime; $i++)
        {
            if ($this->isPrime($i)) {
                return $i;
            }
        }
    }

    /**
     * from https://stackoverflow.com/questions/16763322/a-formula-to-find-prime-numbers-in-a-loop/24769490
     *
     * @param integer $num
     * @return bool
     */
    private function isPrime($num)
    {
        //1 is not prime. See: http://en.wikipedia.org/wiki/Prime_number#Primality_of_one
        if($num == 1)
            return false;

        //2 is prime (the only even number that is prime)
        if($num == 2)
            return true;

        /**
         * if the number is divisible by two, then it's not prime and it's no longer
         * needed to check other even numbers
         */
        if($num % 2 == 0) {
            return false;
        }

        /**
         * Checks the odd numbers. If any of them is a factor, then it returns false.
         * The sqrt can be an aproximation, hence just for the sake of
         * security, one rounds it to the next highest integer value.
         */
        $ceil = ceil(sqrt($num));
        for($i = 3; $i <= $ceil; $i = $i + 2) {
            if($num % $i == 0)
                return false;
        }

        return true;
    }
}