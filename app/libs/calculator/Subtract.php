<?php


namespace App\libs\calculator;

/**
 * Class Subtract
 * @package App\libs\calculator
 */
class Subtract implements OperationInterface
{
    /**
     * @param array $operands
     * @return mixed
     */
    public function evaluate(array $operands = array())
    {
        return $operands[0] - $operands[1];
    }
}