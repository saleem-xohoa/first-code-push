<?php
namespace Database\Seeders;
use App\Models\Reporter;
use Illuminate\Database\Seeder;

class reporterseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reporter::create([
            'id' => 6,
            'name' => 'salman',
            'email' => 'salman@gmail.com',
            'country_id' => '4',

        ]);
    }
}