<?php


namespace App\libs\calculator;

/**
 * Class Divide
 * @package App\libs\calculator
 */
class Divide implements OperationInterface
{
    /**
     * @param array $operands
     * @return float|int|mixed
     */
    public function evaluate(array $operands = array())
    {
        return $operands[0] / $operands[1];
    }
}