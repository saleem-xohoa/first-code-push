<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'father_name',
        'phone_no',
        'address',
    ];

    public function contact()
    {
        return $this->hasOne(contact::class);
    }
}
