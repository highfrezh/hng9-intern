<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArithemeticController extends Controller
{
    public function arithemetic(Request $request)
    {
        if($request->x && $request->y && $request->operation_type){
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
            return response()->json([
                "slackUsername" => "highfezh",
                "result" => $result,
                "operation_type" => $operation,
            ], 200);

        }elseif($request->operation_type){
            $data = $request->operation_type;            
            // Use preg_match_all() function to check match on $data
            preg_match_all('!\d+!', $data, $matches);
            $x = $matches[0][0];
            $y = $matches[0][1];

            $result = $this->performOperationOnString($x, $y, $data);
            return $result;
        }        
    }

    // perform operation if x and y is given
    public function performOperation($x, $y, $operation)
    {
        if($operation == "addition"){
            $result = $x + $y;
        }else if($operation == "subtraction"){
            $result = $x - $y;
        }else if($operation == "multiplication"){
            $result = $x * $y;
        }else{
            $result = $x / $y;
        }
        return $result;
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

            return response()->json([
                "slackUsername" => "highfezh",
                "result" => $result,
                "operation_type" => $operation,
            ], 200);
    }
}
