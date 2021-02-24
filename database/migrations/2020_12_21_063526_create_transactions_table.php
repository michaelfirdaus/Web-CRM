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
            $table->bigInteger('program_id');
            $table->bigInteger('participant_id');
            $table->bigInteger('salesperson_id');
            $table->bigInteger('result_id')->nullable();
            $table->boolean('result_flag')->default(0);
            $table->integer('price');
            $table->string('note')->nullable();
            $table->integer('rating')->nullable();
            $table->text('rating_text')->nullable();
            $table->boolean('recoaching')->default(0);
            $table->integer('recoaching_count')->default(0);
            $table->string('created_by')->nullable();
            $table->string('lastedited_by')->nullable();
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
