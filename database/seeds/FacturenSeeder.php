<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Factuur;

class FacturenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facturen')->truncate();
        // DB::table('facturen')->insert([
        //     'inkomend' => 1,
        //     'factuurnummer' => 1803201901,
        //     'klant_id' => 1,
        //     'datum' => '2019-03-18',
        //     'vervaldatum' => '2020-03-18',
        //     'bedrag_excl' => 1250.59,
        //     'btw' => 21,
        //     'betaald' => 1,
        // ]);

        $factuur = new Factuur;
        $factuur->inkomend = 0;
        $factuur->factuurnummer = 1803201902;
        $factuur->klant_id = 2;
        $factuur->datum = '2019-03-18';
        $factuur->vervaldatum = '2020-03-18';
        $factuur->bedrag_excl = 1000.00;
        $factuur->btw = 21;
        $factuur->betaald = 0;
        $factuur->user_id = 1;
        $factuur->save();

        $factuur = new Factuur;
        $factuur->inkomend = 1;
        $factuur->factuurnummer = 1503201988;
        $factuur->klant_id = 1;
        $factuur->datum = '2019-03-05';
        $factuur->vervaldatum = '2020-03-25';
        $factuur->bedrag_excl = 500.00;
        $factuur->btw = 21;
        $factuur->betaald = 0;
        $factuur->user_id = 1;
        $factuur->save();

        $factuur = new Factuur;
        $factuur->inkomend = 0;
        $factuur->factuurnummer = 1803201908;
        $factuur->klant_id = 2;
        $factuur->datum = '2019-03-18';
        $factuur->vervaldatum = '2020-03-18';
        $factuur->bedrag_excl = 1000.00;
        $factuur->btw = 21;
        $factuur->betaald = 0;
        $factuur->user_id = 1;
        $factuur->save();

        $factuur = new Factuur;
        $factuur->inkomend = 1;
        $factuur->factuurnummer = 1503201990;
        $factuur->klant_id = 1;
        $factuur->datum = '2019-03-08';
        $factuur->vervaldatum = '2020-03-28';
        $factuur->bedrag_excl = 267.00;
        $factuur->btw = 21;
        $factuur->betaald = 0;
        $factuur->user_id = 1;
        $factuur->save();

    }
}
