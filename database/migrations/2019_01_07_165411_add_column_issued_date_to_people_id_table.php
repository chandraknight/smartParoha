<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIssuedDateToPeopleIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people_id', function (Blueprint $table) {
            $table->string('issued_date')->nullable();
            $table->string('issued_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people_id', function (Blueprint $table) {
            $table->dropColumn('issued_date');
            $table->dropColumn('issued_by');
        });
    }
}
