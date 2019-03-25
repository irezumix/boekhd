<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $user = new User;
        $user->name = "Pieter";
        $user->email = "pietervanlooy@icloud.com";
        $user->password = bcrypt('piemelsloef!');
        $user->save();
    }
}
