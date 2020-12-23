<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachJobconnectorParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_jobconnector_participant', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('participant_id');
            $table->bigInteger('jobconnector_id');
            $table->date('date');
            $table->string('application_status');
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
        Schema::dropIfExists('coach_jobconnector_participant');
    }
}
