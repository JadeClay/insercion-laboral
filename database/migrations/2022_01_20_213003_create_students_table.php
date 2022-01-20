<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->BigInteger('identification');
            $table->date('birthday');
            $table->string('sex');
            $table->string('direction');
            $table->string('sector');
            $table->string('municipality');
            $table->string('province');
            $table->boolean('nationality');
            $table->BigInteger('homeNumber');
            $table->BigInteger('cellphone');
            $table->boolean('hasDrivingLicense');
            $table->boolean('hasVehicle');
            $table->year('graduationYear');
            $table->string('school');
            $table->string('grade');
            $table->string('enrollmentID');
            $table->string('career');
            $table->integer('experience');
            $table->string('workArea');
            $table->unsignedBigInteger('user_id');
            $table->BigInteger('offer_id');
            $table->string('cv_path');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('students');
    }
}
