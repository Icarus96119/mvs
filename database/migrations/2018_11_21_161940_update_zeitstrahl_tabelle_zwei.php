
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateZeitstrahlTabelleZwei extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('timeline', function (Blueprint $table) {

            $table->integer('finanzierungsbedarf_phase_eins');
            $table->integer('jahreszins_phase_eins');
            $table->integer('laufzeit_phase_eins');
            $table->integer('rate_monatlich_phase_eins');
            $table->integer('restschuld_phase_eins');
            $table->integer('finanzierungsbedarf_phase_zwei');
            $table->integer('jahreszins_phase_zwei');
            $table->integer('laufzeit_phase_zwei');
            $table->integer('rate_monatlich_phase_zwei');
            $table->integer('restschuld_ende');

        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('timeline', function (Blueprint $table) {

            $table->integer('finanzierungsbedarf_phase_eins');
            $table->integer('jahreszins_phase_eins');
            $table->integer('laufzeit_phase_eins');
            $table->integer('rate_monatlich_phase_eins');
            $table->integer('restschuld_phase_zwei');
            $table->integer('finanzierungsbedarf_phase_zwei');
            $table->integer('jahreszins_phase_zwei');
            $table->integer('laufzeit_phase_zwei');
            $table->integer('rate_monatlich_phase_zwei');
            $table->integer('restschuld_phase_zwei');
            $table->integer('restschuld_ende');

        });    
    }
}
