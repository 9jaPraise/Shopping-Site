<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //a category hasMany Posts
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
