<?php
namespace App\traits;
trait jasontraitresponse{
    public function sendsecc(string $massage ,mixed $data,int $status=200 )
     {   return response()->json([
            'susecc'=>true,
            'massage'=>$massage,
            'data'=>$data,
     ],$status);
    }
}