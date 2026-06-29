<?php
namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class contactseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {

            $contact             = new contact;
            $contact->id         = "3";
            $contact->email      = "salman@gmail.com";
            $contact->phone      = "03126834225";
            $contact->address    = "Gulgasht colony ";
            $contact->city       = "karachi";
            $contact->student_id = "3";
            $contact->save();

        }
    }
}
