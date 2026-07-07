<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {

            $user       = new user;
            $user->id   = "3";
            $user->name = "zain";
            $user->email  = "zain@gmail.com";
            $user->save();

        }
    }
}