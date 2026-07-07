<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function reporters()
    {
        return $this->hasMany(Reporter::class);
    }
    public function articles()
    {
        return $this->hasManyThrough(Article::class, Reporter::class);
    }
}
