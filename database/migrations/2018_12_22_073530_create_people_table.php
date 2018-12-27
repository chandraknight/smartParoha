<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('DOB_np')->nullable();
            $table->date('DOB_en')->nullable();
            $table->enum('gender',['male','female','other'])->default('male');
            $table->enum('religion',['hindu','muslim','christan','buddhis','kirat','sikh','jain','other']);
            $table->string('nationality')->nullable();
            $table->string('caste')->nullable();
            $table->enum('marital_status',['yes','no'])->default('no');
            $table->lineString('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('photo')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('people');
    }
}
