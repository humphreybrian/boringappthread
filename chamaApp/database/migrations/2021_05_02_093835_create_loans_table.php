<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('loan_receipt_number');
            $table->string('loan_type_id'); //each loan type has its own pay period.
            $table->string('loan_amount');
            $table->string('loan_request_date');
            $table->string('loan_status');
            $table->string('loan_refrence_number');
            $table->timestamps();

           // php artisan migrate:refresh --path=/database/migrations/2021_05_02_093835_create_loans_table.php

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
