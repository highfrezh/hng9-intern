<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArithemeticController extends Controller
{
    public function arithemetic(Request $request)
    {
            //validate data
            $validated = $request->validate([
            'operation_type' => 'required',
            'x' => 'required',
            'y' => 'required',
            ]);

            $x = $request->x;
            $y = $request->y;
            $operation = $request->operation_type;

            $result = $this->performOperation($x, $y, $operation);
            return $result;        
    }

    // perform operation if x and y is given
    public function performOperation($x, $y, $operation)
    {
        if($operation == "addition"){
            $result = $x + $y;
            $operation = $operation;
        }else if($operation == "subtraction"){
            $result = $x - $y;
            $operation = $operation;
        }else if($operation == "multiplication"){
            $result = $x * $y;
            $operation = $operation;
        }elseif($operation == "division"){
            $result = $x / $y;
            $operation = $operation;
        }else{
            $data = $this->performOperationOnString($x, $y, $operation);
            $result = $data[0];
            $operation = $data[1];
        }
        return response()->json([
                "slackUsername" => "highfezh",
                "result" => $result,
                "operation_type" => $operation,
            ], 200);
    }

    //perform operation if operation_type without x and y;
    public function performOperationOnString($x, $y, $data)
    {
        $operation = array("add", "subtract", "multiply", "divide", "addition", "subtraction", "multiplication", "division");
        if (str_contains($data, $operation[0])){
                $result = $x + $y;
                $operation = $operation[0];
            }elseif(str_contains($data, $operation[1])){
                $result = $x - $y;
                $operation = $operation[1];
            }elseif(str_contains($data, $operation[2])){
                $result = $x * $y;
                $operation = $operation[2];
            }elseif(str_contains($data, $operation[3])){
                $result = $x / $y;
                $operation = $operation[3];
            }elseif(str_contains($data, $operation[4])){
                $result = $x + $y;
                $operation = $operation[4];
            }elseif(str_contains($data, $operation[5])){
                $result = $x - $y;
                $operation = $operation[5];
            }elseif(str_contains($data, $operation[6])){
                $result = $x * $y;
                $operation = $operation[6];
            }elseif(str_contains($data, $operation[7])){
                $result = $x / $y;
                $operation = $operation[7];
            }
            $data = array($result, $operation);
            return $data;
    }
}
