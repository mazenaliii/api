<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title',
        'image',
        'materials',
        'description'
    ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}

