<?php
namespace App\traits;
trait jsontrait{
    public function sendsecc(string $massage ,mixed $data=[],int $status=200 )
     {   return response()->json([
            'susecc'=>true,
            'massage'=>$massage,
            'data'=>$data,
     ],$status);
    }
    public function senderror(string $massage ,int $status=400 )
     {  
        return response()->json([
            'susecc'=>false,
            'massage'=>$massage,
          
     ],$status);
    }
    public function senderrors(string $massage ,mixed $errors ,int $status=400 )
     {  
        return response()->json([
            'susecc'=>false,
            'massage'=>$massage,
            'error'=>$errors,
          
     ],$status);
    }
}