<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function updateCsv(Request $request)
    {
        if($request->isMethod("post")){
            // Check if file is valid and move to folder
            if($request->hasFile('nft_csv')){
                if($request->file('nft_csv')->isValid()){
                    $file = $request->file('nft_csv');
                    $destination = public_path('imports/csv');
                    $ext = $file->getClientOriginalExtension();
                    $filename = "nft-".rand().".".$ext;
                    $file->move($destination,$filename);
                }
            }


            $uploadedFile = public_path('/imports/csv/'.$filename);
            //csvToArray() method convert csv file to array check down below,         
            $nfts = $this->csvToArray($uploadedFile);
            foreach($nfts as $nft){
                // generating sha256 code
                $hash = hash_hmac('sha256', utf8_encode($nft['Filename']), rand(), false);
                //appending Hash data to the array
                $nft['Hash'] = $hash;
                //converting attribute to array
                $nft['Attributes'] = array_column(array_chunk(preg_split("/[:;]/", $nft['Attributes']), 2), 1, 0);
                //creating json file for each row
                $fileName = "nft".$nft['Filename'].'.json';
                $fileStorePath = public_path('/imports/nfts/'.$fileName);
                
                File::put($fileStorePath, json_encode($nft));    
            }

            return "NFTs JSON files created successfully!";

        }else{
            //rendering a view blade file to import csv file;
            return view('nft_csv');
        }
    }

    //CSV TO ARRAY METHOD
    public function csvToArray($filename = '', $delimiter = ','){
        if (!file_exists($filename) || !is_readable($filename))
            return false;
            $header = null;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== false){
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false){
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
                }
            fclose($handle);
            }
        return $data;
    }  
    
}
