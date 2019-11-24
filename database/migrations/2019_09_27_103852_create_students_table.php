<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricula');
            $table->string('curp');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('telefono');
            $table->string('email');
            $table->bigInteger('career_id')->unsigned();
            $table->bigInteger('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('career_id')->references('id')->on('careers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
