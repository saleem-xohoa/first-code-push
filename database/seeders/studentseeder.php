<?php
namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {

            $student       = new student;
            $student->id   = "3";
            $student->name = "salman";
            $student->age  = "30";
            $student->save();

        }
    }
}