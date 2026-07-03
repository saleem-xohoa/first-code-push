<?php

namespace Database\Seeders;
use App\Models\PhoneNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhoneNumber::create([
            'id' => 4,
            'number' => '0334-7622912',
            'company_id' => 4,
        ]);
    }
}