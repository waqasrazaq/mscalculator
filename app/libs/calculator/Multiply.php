<?php


namespace App\libs\calculator;

/**
 * Class Multiply
 * @package App\libs\calculator
 */
class Multiply implements OperationInterface
{
    /**
     * @param array $operands
     * @return float|int|mixed
     */
    public function evaluate(array $operands = array())
    {
        return $operands[0] * $operands[1];
    }
}