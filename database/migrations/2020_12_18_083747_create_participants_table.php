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
            $table->bigInteger('know_id');
            $table->bigInteger('profession_id');
            $table->bigInteger('memberreference_id')->nullable();
            $table->string('memberreference_name')->nullable();
            $table->string('profession_detail')->nullable();
            $table->string('name');
            $table->string('pob');
            $table->string('dob');
            $table->string('phonenumber');
            $table->string('address');
            $table->string('email');
            $table->string('student_idcard')->nullable();
            $table->string('cv_link')->nullable();
            $table->string('sp_link')->nullable();
            $table->string('emergencycontact_name');
            $table->string('emergencycontact_phone');
            $table->date('member_validthru')->nullable();
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
        Schema::dropIfExists('participants');
    }
}
