<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            // Prices are in a fixed number of currencies, so we persist them in this table.
            // Values should be persisted. Not formats.
            // Simplest way is to persist in smalles available unit in each currency.
            // This exclude dots, commas and prefered formatting in FE, but complicates naming.
            $table->integer('price_usd_cent')->unsigned(); // Values 0 to 4294967295
            $table->integer('price_eur_cent')->unsigned();
            $table->integer('price_dkk_ore')->unsigned();
            $table->integer('price_sek_ore')->unsigned();
            $table->softDeletes(); // Data will be recoverable after deletion.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
