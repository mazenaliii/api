<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_course extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'subject'

    ];
    public function user(){
        return $this->hasMany(User::class,'user_id');
    }

}
