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
            $table->dropColumn('marital_status');
        });

        Schema::table('people',function(Blueprint $table){
            $table->enum('marital_status',['Married','Unmarried','Divorced','Widow','Widower']);
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
