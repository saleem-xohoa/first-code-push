<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function rells()
    {
        return $this->morphByMany(Rell::class, 'taggable');
    }

    public function vedios()
    {
        return $this->morphByMany(Vedio::class, 'taggable');
    }
}
