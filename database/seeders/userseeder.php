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
            $user->id   = "4";
            $user->name = "hamza";
            $user->email  = "hamza@gmail.com";
            $user->save();

        }
    }
}
