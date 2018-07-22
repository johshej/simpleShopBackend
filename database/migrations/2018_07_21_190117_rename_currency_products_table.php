<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCurrencyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('products', function(Blueprint $table) {
        $table->renameColumn('price_usd_cent', 'price_usd');
        $table->renameColumn('price_eur_cent', 'price_eur');
        $table->renameColumn('price_dkk_ore', 'price_dkk');
        $table->renameColumn('price_sek_ore', 'price_sek');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('products', function(Blueprint $table) {
        $table->renameColumn('price_usd', 'price_usd_cent');
        $table->renameColumn('price_eur', 'price_eur_cent');
        $table->renameColumn('price_dkk', 'price_dkk_ore');
        $table->renameColumn('price_sek', 'price_sek_ore');
      });
    }
}
