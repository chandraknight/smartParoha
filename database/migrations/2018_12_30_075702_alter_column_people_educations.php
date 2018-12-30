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
            $table->dropColumn('degree');
        });
        Schema::table('people_educations',function(Blueprint $table){
            $table->enum('degree',['Below SLC/SEE','SLC','Intermediate','Bachelor','Master','MPhil','PhD','Vocational Training','Others']);
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
