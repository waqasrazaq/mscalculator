<?php


namespace App\libs\calculator;

/**
 * Class Calculator
 * @package App\libs\calculator
 */
class Calculator
{
    protected $operands = array();
    private $operation;

    /**
     * Add list of operands for next operation
     * @param array $operands
     */
    public function setOperands(array $operands = array())
    {
        $this->operands = $operands;
    }

    /**
     * The operation to be performed like Add, Subtract etc
     * @param OperationInterface $operation
     */
    public function setOperation(OperationInterface $operation)
    {
        $this->operation = $operation;
    }

    /**
     * Execute the operation and returns the output
     * @return mixed
     */
    public function process()
    {
        return $this->operation->evaluate($this->operands);
    }

    public static function getCalculator()
    {
        return new self();
    }
}