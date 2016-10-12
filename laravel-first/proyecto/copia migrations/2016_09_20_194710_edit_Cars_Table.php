<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table ('cars', function (Blueprint $table) {
            $table->string('brand', 25)->change();
            $table->string('modelo', 40)->change();
            $table->date('year')->change();
            $table->string('color', 10)->change();
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
        Schema::table('cars', function (Blueprint $table) {
            $table->string('brand', 100)->change();
            $table->string('modelo', 100)->change();
            $table->integer('year')->change();
            $table->string('color', 100)->change();
        });
    }
}
