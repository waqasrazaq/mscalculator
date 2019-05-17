<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('calculator/add/{operand1}/{operand2}', 'CalculatorController@add');
Route::get('calculator/subtract/{operand1}/{operand2}', 'CalculatorController@subtract');
Route::get('calculator/multiply/{operand1}/{operand2}', 'CalculatorController@multiply');
Route::get('calculator/divide/{operand1}/{operand2}', 'CalculatorController@divide');
Route::get('calculator/squareroot/{operand}', 'CalculatorController@squareRoot');
Route::get('calculator/qubicroot/{operand}', 'CalculatorController@qubicRoot');
Route::get('calculator/power/{operand1}/{operand2}', 'CalculatorController@power');
Route::get('calculator/factorial/{operand1}', 'CalculatorController@factorial');