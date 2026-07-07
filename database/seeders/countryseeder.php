<?php

namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class countryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'id' => 7,
            'name' => 'china',


        ]);
    }
}