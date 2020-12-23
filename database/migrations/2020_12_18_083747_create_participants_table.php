<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('branch_id');
            $table->bigInteger('program_id')->nullable();
            $table->bigInteger('knowcn_id');
            $table->bigInteger('profession_id')->nullable();
            $table->bigInteger('reference_id')->nullable();
            $table->string('name');
            $table->string('pob');
            $table->string('dob');
            $table->string('phonenumber');
            $table->string('address');
            $table->string('email');
            $table->string('student_idcard')->nullable();
            $table->string('cv_link');
            $table->string('sp_link')->nullable();
            $table->string('emergencycontact_name');
            $table->string('emergencycontact_phone');
            $table->date('member_validthru')->nullable();
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
        Schema::dropIfExists('participants');
    }
}
