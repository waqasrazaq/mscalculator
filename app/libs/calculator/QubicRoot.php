<?php


namespace App\libs\calculator;

/**
 * Class QubicRoot
 * @package App\libs\calculator
 */
class QubicRoot implements OperationInterface
{
    /**
     * @param array $operands
     * @return float|int|mixed
     */
    public function evaluate(array $operands = array())
    {
        return pow($operands[0],1/3);
    }
}