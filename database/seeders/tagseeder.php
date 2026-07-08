<?php

namespace Database\Seeders;
use \App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tagseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'id' => 8,
            'name' => 'Danish tamoor',
        ]);
    }
}