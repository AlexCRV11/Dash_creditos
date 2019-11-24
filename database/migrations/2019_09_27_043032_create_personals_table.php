<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('RFC')->unique();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('telefono');
            $table->string('email');
            $table->string('especialidad');
            $table->bigInteger('profession_id')->unsigned();
            $table->foreign('profession_id')->references('id')->on('professions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('personals');
    }
}
