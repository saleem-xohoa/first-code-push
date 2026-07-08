<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rell extends Model
{
     protected $guarded = [];

     /**
     * one to one polymorphic.
     */

    // public function image(){
    //     return $this->morphOne(Image::class,'imageable');
    // }

    /**
     * one to many polymorphic
     */

    // public function comments(){
    //     return $this->morphMany(Comment::class,'comentable');
    // }

    /**
     * Many to many polymorphic
     */

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}