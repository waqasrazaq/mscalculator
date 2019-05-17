<?php


namespace App\libs\calculator;

/**
 * Class SquareRoot
 * @package App\libs\calculator
 */
class SquareRoot implements OperationInterface
{
    /**
     * @param array $operands
     * @return float|mixed
     */
    public function evaluate(array $operands = array())
    {
        return sqrt($operands[0]);
    }
}