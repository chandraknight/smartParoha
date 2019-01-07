<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->string('related_person_name')->nullable();
            $table->string('related_person_citizenship')->nullable();
            $table->enum('relationship_type', ['father', 'mother', 'brother', 'sister', 'son', 'daughter',
                'daughterInlaw', 'grandson', 'grandDaughter']);
            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->onDelete('cascade');
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
        Schema::dropIfExists('people_families');
    }
}
