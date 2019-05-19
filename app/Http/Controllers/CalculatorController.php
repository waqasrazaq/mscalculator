<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\libs\calculator\Add;
use App\libs\calculator\Calculator;
use App\libs\calculator\Divide;
use App\libs\calculator\factorial;
use App\libs\calculator\Multiply;
use App\libs\calculator\Power;
use App\libs\calculator\QubicRoot;
use App\libs\calculator\SquareRoot;
use App\libs\calculator\Subtract;
use Exception;

/**
 * Class CalculatorController
 * @package App\Http\Controllers
 */
class CalculatorController extends Controller
{
    /**
     * @param Calculator $calculator
     * @param Add $add
     * @param $operand1
     * @param $operand2
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Calculator $calculator, Add $add, $operand1, $operand2)
    {
        try {
            $calculator->setOperation($add);
            $calculator->setOperands(array($operand1, $operand2));
            LogActivity::addToLog($operand1 . " + " . $operand2);
            return response()->json(array('output'=> $calculator->process()),200);
        } catch (Exception $e) {
            return response()->json("Internal server error".$e->getMessage(), 500);
        }
    }

    /**
     * @param Calculator $calculator
     * @param Subtract $subtract
     * @param $operand1
     * @param $operand2
     * @return \Illuminate\Http\JsonResponse
     */
    public function subtract(Calculator $calculator, Subtract $subtract, $operand1, $operand2) {
        try {
            $calculator->setOperation($subtract);
            $calculator->setOperands(array($operand1, $operand2));
            LogActivity::addToLog($operand1 . " - " . $operand2);
            return response()->json(array('output'=> $calculator->process()),200);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }

    /**
     * @param Calculator $calculator
     * @param Multiply $multiply
     * @param $operand1
     * @param $operand2
     * @return \Illuminate\Http\JsonResponse
     */
    public function multiply(Calculator $calculator, Multiply $multiply, $operand1, $operand2) {
        try {
            $calculator->setOperation($multiply);
            $calculator->setOperands(array($operand1, $operand2));
            LogActivity::addToLog($operand1 . " * " . $operand2);
            return response()->json(array('output'=> $calculator->process()),200);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }

    /**
     * @param Calculator $calculator
     * @param Divide $divide
     * @param $operand1
     * @param $operand2
     * @return \Illuminate\Http\JsonResponse
     */
    public function divide(Calculator $calculator, Divide $divide, $operand1, $operand2) {
        try {
            $calculator->setOperation($divide);
            $calculator->setOperands(array($operand1, $operand2));
            LogActivity::addToLog($operand1 . " / " . $operand2);
            return response()->json(array('output'=> $calculator->process()),200);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }

    /**
     * @param Calculator $calculator
     * @param SquareRoot $squareRoot
     * @param $operand
     * @return \Illuminate\Http\JsonResponse
     */
    public function squareRoot(Calculator $calculator, SquareRoot $squareRoot, $operand) {
        try {
            $calculator->setOperation($squareRoot);
            $calculator->setOperands(array($operand));
            LogActivity::addToLog("Squareroot of " . $operand);
            return response()->json(array('output'=> $calculator->process()),200);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }

    /**
     * @param Calculator $calculator
     * @param QubicRoot $qubicRoot
     * @param $operand
     * @return \Illuminate\Http\JsonResponse
     */
    public function qubicRoot(Calculator $calculator, QubicRoot $qubicRoot, $operand) {
        try {
            $calculator->setOperation($qubicRoot);
            $calculator->setOperands(array($operand));
            LogActivity::addToLog("Qubicroot of " . $operand);
            return response()->json(array('output'=> $calculator->process()),200);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }

    /**
     * @param Calculator $calculator
     * @param Power $power
     * @param $operand1
     * @param $operand2
     * @return \Illuminate\Http\JsonResponse
     */
    public function power(Calculator $calculator, Power $power, $operand1, $operand2) {
        try {
            $calculator->setOperation($power);
            $calculator->setOperands(array($operand1, $operand2));
            LogActivity::addToLog($operand1 . " ^ " . $operand2);
            return response()->json(array('output'=> $calculator->process()),200);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }

    /**
     * @param Calculator $calculator
     * @param factorial $factorial
     * @param $operand
     * @return \Illuminate\Http\JsonResponse
     */
    public function factorial(Calculator $calculator, Factorial $factorial, $operand) {
        try {
            $calculator->setOperation($factorial);
            $calculator->setOperands(array($operand));
            LogActivity::addToLog($operand . "!");
            return response()->json(array('output'=> $calculator->process()),200);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }
}
