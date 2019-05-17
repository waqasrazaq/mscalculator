<?php


namespace App\libs\calculator;

/**
 * Class Add
 * @package App\libs\calculator
 */
class Add implements OperationInterface
{
    /**
     * @param array $operands
     * @return mixed
     */
    public function evaluate(array $operands = array())
    {
        return $operands[0]+$operands[1];
    }
}