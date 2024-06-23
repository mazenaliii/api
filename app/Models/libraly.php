<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libraly extends Model
{
    use HasFactory;
    protected $table = 'libraries';

    protected $fillable = [
        'title',
        'filename',
        'user_id',
        'grade_id'
  
    ];
    public function user(){
        return $this->belongsTo(user::class,'user_id');
    }
    public function grades()
    {
        return $this->hasMany(grade::class);
    }
}
