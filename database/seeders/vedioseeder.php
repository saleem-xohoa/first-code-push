<?php

namespace Database\Seeders;

use App\Models\Vedio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vedioseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Vedio::create([
            'id' => 3,
            'title' => 'Vedio title three',
            'url' => 'vedios/three.mp4',


        ]);
    }
}
