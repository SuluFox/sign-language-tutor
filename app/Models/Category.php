<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monolog\Level;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
      'level_id',
      'name',  
    ];

    public function level(){
        return $this->belongsTo(Level::class);
    }
    
    public function contents(){
        return $this->hasMany(Content::class);
    }
}