<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalcResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_result', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kunden_id');
            $table->string('loan_period')->default('10');
            $table->string('payment_month')->default(date('Y'));
            $table->string('payment_year')->default(date('m'));
            $table->string('payment_discount')->default('0,00');
            $table->string('registery_fees')->default('0,00');
            $table->string('payment_amount')->default('0,00');
            $table->string('borrowing_rate')->default('0');
            $table->string('repayment_date_inp');
            $table->string('montly_deposit_val')->default('0');
            $table->string('message_payment_opt');
            $table->string('annual_unsheduled_month')->default(date('m'));
            $table->string('annual_unsheduled_year')->default(date('Y'));
            $table->string('annual_unsheduled_val')->default('0');
            $table->string('annual_to_month')->default(date('m'));
            $table->string('annual_to_year')->default(date('Y'));
            $table->string('onetime_unsheduled_month')->default(date('m'));
            $table->string('onetime_unsheduled_year')->default(date('Y'));
            $table->string('onetime_unsheduled_val')->default('0');
            $table->string('outstanding_balance')->default('0,00');
            $table->string('effective_interest')->default('0,00');
            $table->string('connection_credit')->default('0,00');
            $table->string('new_borrowing_rate')->default('0');
            $table->string('new_repayment_rate_inp')->default('0');
            $table->string('new_rate_inp')->default('0,00');
            $table->string('total_maturity')->default('0/0');
            $table->string('sparsumme')->default('0,00');
            $table->string('monthly_interest')->default('0,00');
            $table->string('monthly_saving')->default('0,00');
            $table->string('monthly_payment')->default('0,00');
            $table->string('laufzeit')->default('1');
            $table->string('bausparer_flag')->default('false');
            $table->string('acquisition_fee')->default('0,00');
            $table->string('bausparer_pay_type')->default('one');
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
        Schema::dropIfExists('calc_result');
    }
}
