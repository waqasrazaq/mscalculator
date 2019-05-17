<?php


namespace App\libs\calculator;

/**
 * Class Power
 * @package App\libs\calculator
 */
class Power implements OperationInterface
{
    /**
     * @param array $operands
     * @return float|int|mixed
     */
    public function evaluate(array $operands = array())
    {
        return pow($operands[0], $operands[1]);
    }
}