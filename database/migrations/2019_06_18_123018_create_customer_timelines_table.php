<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_timelines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kundens_id')->unsigned();
            $table->integer('calculation_id')->unsigned();

            $table->integer('darlehen');
            $table->integer('zinsstaz');
            $table->integer('tilgung');
            $table->integer('laufzeit');
            $table->integer('rate_monatl');
            $table->integer('restschuld');
            
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
        Schema::dropIfExists('customer_timelines');
    }
}
