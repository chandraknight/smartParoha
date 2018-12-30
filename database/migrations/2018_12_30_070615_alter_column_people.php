<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnPeople extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people',function(Blueprint $table){
           $table->dropColumn('DOB_en');
           $table->dropColumn('DOB_np');
        });
        Schema::table('people',function(Blueprint $table){
            $table->string('DOB_en')->nullable();
            $table->string('DOB_np')->nullable();
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
