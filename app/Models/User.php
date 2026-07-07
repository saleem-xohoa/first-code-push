<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $guarded = [];


    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    // public function post()
    // {
    //     return $this->hasMany(Post::class);
    // }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'user_role');
    // }
    // public function company()
    // {
    //     return $this->hasOne(Company::class);
    // }
    // public function phoneNumber()
    // {
    //     return $this->hasOneThrough(PhoneNumber::class, Company::class);
    // }
}