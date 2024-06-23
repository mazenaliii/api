<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
    'progress',
    'resource_id'
];
public function resource(){
    return $this->hasMany(resourse::class,'resource_id');
}

public function user(){
    return $this->hasMany(user::class,'user_id');
}
}
