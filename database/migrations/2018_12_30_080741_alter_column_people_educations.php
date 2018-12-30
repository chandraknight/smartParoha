<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnPeopleEducations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people_educations',function(Blueprint $table){
            $table->dropColumn('year_of_start');
            $table->dropColumn('year_of_completion');
        });

        Schema::table('people_educations',function(Blueprint $table){
            $table->string('year_of_start')->nullable();
            $table->string('year_of_completion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
