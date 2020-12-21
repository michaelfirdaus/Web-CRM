<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction_id');
            $table->integer('score')->nullable();
            $table->string('grade')->nullable();
            $table->string('jacket_size')->nullable();
            $table->string('skillcertificate_number')->nullable();
            $table->date('skillcertificate_pickdate')->nullable();
            $table->string('attendancecertificate_number')->nullable();
            $table->date('attendancecertificate_pickdate')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('results');
    }
}
