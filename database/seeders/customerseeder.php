<?php
namespace Database\Seeders;

use App\Models\Customer;
use Faker\factory as Faker;
use Illuminate\Database\Seeder;

class customerseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            $customer                = new customer;
            $customer->customer_name = $faker->name;
            $customer->father_name   = $faker->name;
            $customer->phone_no      = $faker->phoneNumber();
            $customer->address       = $faker->address();
            $customer->save();
        }
    }
}
