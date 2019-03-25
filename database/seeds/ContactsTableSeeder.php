<?php

use App\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->truncate();
        
        $contact = new Contact;
        $contact->naam = "BOSS NV";
        $contact->straat = "Weverboslaan";
        $contact->nummer_bus = "41";
        $contact->postcode = "9000";
        $contact->gemeente = "Gent";
        $contact->telefoon = "0474483187";
        $contact->email = "jeroen.dg@hotmail.com";
        $contact->btw_nummer = "BE.9999.999.999";
        $contact->user_id = 1;
        $contact->save();

        $contact = new Contact;
        $contact->naam = "Goeroe NV";
        $contact->straat = "Canadezenlaan";
        $contact->nummer_bus = "40";
        $contact->postcode = "6900";
        $contact->gemeente = "Luik";
        $contact->telefoon = "0469696969";
        $contact->email = "goeroe@hotmail.com";
        $contact->btw_nummer = "BE.6969.333.333";
        $contact->user_id = 1;
        $contact->save();

    }
}