<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;
    protected $fillable=[
'name',
    ];
    public function library(){
        return $this->belongsTo(libraly::class,'user_id');
}
}