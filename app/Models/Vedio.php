<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vedio extends Model
{
    protected $guarded = [];

    /**
     * One to many polymorphic
     */

    // public function comments(){
    //     return $this->morphMany(Comment::class,'comentable');
    // }


    /**
     * Many to many polymorphic
     */

    public function tags(){
        return $this->morphtoMany(Tag::class,'taggable');
    }
}