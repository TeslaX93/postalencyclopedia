<?php

namespace App\Utils;

class ModuloNumber
{

    private int $number;

    private int $modulo;

    public function __construct(int $number = 0, int $modulo = INF)
    {
        $this->number = $number;
        $this->modulo = $modulo;
    }

    /**
     * @param  int ...$numbers
     * @return void
     */
    public function add(int ...$numbers)
    {
        $this->number = array_sum($numbers)%$this->modulo;
    }

    /**
     * @param  int ...$numbers
     * @return void
     */
    public function substract(int ...$numbers)
    {
        foreach($numbers as $n) {
            $this->number -= $n;
        }
        $this->number %= $this->modulo;
    }

    /**
     * @param  int ...$numbers
     * @return void
     */
    public function multiply(int ...$numbers)
    {
        foreach($numbers as $n) {
            $this->number *=$n;
        }
        $this->number %= $this->modulo;
    }

    /**
     * @param  int $divisor
     * @return void
     */
    public function divide(int $divisor)
    {
        if($divisor != 0) {
            $this->number %=$divisor;
        } else {
            throw new \DivisionByZeroError("Division by zero");
        }
    }
}
