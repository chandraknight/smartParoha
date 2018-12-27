<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->enum('degree', ['below_slc', 'slc', 'intermediate', 'bachelors', 'masters', 'mphil', 'phd']);
            $table->string('board_university');
            $table->date('year_of_start')->nullable();
            $table->date('year_of_completion');
            $table->string('stream')->nullable();
            $table->string('college')->nullable();
            $table->timestamps();
            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_educations');
    }
}
