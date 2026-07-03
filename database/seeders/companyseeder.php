<?php

namespace Database\Seeders;

use App\Models\Company;

use Illuminate\Database\Seeder;

class companyseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'id' => 4,
            'compmany_name' => 'United',
            'user_id' => 4,
        ]);
    }
}