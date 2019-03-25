<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FacturenSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(UserSeeder::class);
    }
}
