<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactons', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('deposit_receipt_number');
            $table->string('pay_period');
            $table->string('deposit_amount');
            $table->string('deposit_note');
            $table->string('deposit_status');
            $table->string('payment_method');
            $table->string('reference_number');
            $table->string('transaction_type');
            //payment method
            // payment_method
            // reference_number
            $table->timestamps();

           // php artisan migrate:refresh --path=/database/migrations/2021_05_01_211110_create_transactons_table.php

            // 'deposit_receipt_number' => 'required',
            // 'pay_period' => 'required',
            // 'deposit_amount' => 'required',
            // 'deposit_note' => 'required',
            // 'deposit_status' => 'required',
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactons');
    }
}
