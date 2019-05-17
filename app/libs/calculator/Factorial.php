<?php


namespace App\libs\calculator;

/**
 * Class factorial
 * @package App\libs\calculator
 */
class factorial implements OperationInterface
{
    /**
     * @param array $operands
     * @return float|int|mixed
     */
    public function evaluate(array $operands = array())
    {
        $factorial = 1;

        for ($x=$operands[0]; $x>=1; $x--) {
            $factorial = $factorial * $x;
        }

        return $factorial;
    }
}