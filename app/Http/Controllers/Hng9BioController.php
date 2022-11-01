<?php

namespace App\Http\Controllers;

use App\Models\Hng9bio;
use Illuminate\Http\Request;

class Hng9BioController extends Controller
{
    public function createHngBio()
    {
        Hng9bio::create([
            "slackUsername" => "highfrezh",
            "backend" => 1,
            "age" => 25,
            "bio" => "Am Olabintan Ibraheem junior Laravel backend developer",
        ]);
    }
    public function hngBio()
    {
        $bios = Hng9bio::select('slackUsername','backend', 'age', 'bio')->get()->toArray();
        foreach($bios as $bio){
            if($bio['backend']==1){
                $bio['backend']=true;
            }         
            return response()->json($bio);
        }
    }
}
