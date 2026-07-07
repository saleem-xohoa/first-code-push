<?php

namespace Database\Seeders;
use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class articleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'id' => 4,
            'title' => 'student',
            'description' => 'I am a student ',
            'reporter_id' => '1',

        ]);
    }
}