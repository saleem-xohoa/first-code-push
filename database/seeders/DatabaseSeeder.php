<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
     // depends on country
    articleseeder::class,   // depends on reporter
    // other seeders...
]);
    }
}
