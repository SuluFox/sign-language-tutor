<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'image_url',
        'description',
    ];
    
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    
}