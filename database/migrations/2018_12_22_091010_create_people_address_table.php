<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_address', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->string('country')->default('nepal');
            $table->string('state')->default('provience-2');
            $table->string('district')->default('rauthat');
            $table->string('muncipality');
            $table->string('ward');
            $table->string('village')->nullable();
            $table->string('tole')->nullable();
            $table->string('house')->nullable();
            $table->enum('address_type', ['permanent', 'current']);
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
        Schema::table('people_address', function (Blueprint $table) {
            //
        });
    }
}
