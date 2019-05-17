<?php


namespace App\libs\calculator;

/**
 * Interface OperationInterface
 * @package App\libs\calculator
 */
interface OperationInterface
{
    /**
     * @param array $operands
     * @return mixed
     */
    public function evaluate(array $operands = array());
}