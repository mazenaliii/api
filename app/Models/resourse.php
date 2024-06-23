<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resourse extends Model
{
    use HasFactory;
    protected $fillable=[
'name',
'image',
'description',
'level',
'semester',
'user_id'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
    
}
