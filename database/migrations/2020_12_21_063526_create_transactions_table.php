<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('programpivot_id');
            $table->bigInteger('participant_id');
            $table->bigInteger('salesperson_id');
            $table->integer('price');
            $table->integer('firsttrans');
            $table->integer('secondtrans')->nullable();
            $table->integer('cashback')->nullable();
            $table->string('note')->nullable();
            $table->integer('rating');
            $table->string('rating_text');
            $table->boolean('recoaching')->default(0)->change();
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
        Schema::dropIfExists('transactions');
    }
}
