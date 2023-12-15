<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //A post belongsTo a user

    public function user(){
        return $this -> belongsTo(User::class);
    }

    //We have a post & it belongsTo a Category

    public function category(){
        return $this ->belongsTo(Category::class);
    }

}
