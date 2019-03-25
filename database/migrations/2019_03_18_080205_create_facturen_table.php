<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->boolean('inkomend');
            $table->integer('factuurnummer');
            $table->integer('klant_id');
            $table->date('datum');
            $table->date('vervaldatum');
            $table->decimal('bedrag_excl', 10, 2);
            $table->integer('btw');
            $table->boolean('betaald');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturen');
    }
}
