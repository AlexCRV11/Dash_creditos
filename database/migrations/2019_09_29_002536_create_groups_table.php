<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('activity_id')->unsigned();
            $table->bigInteger('personal_id')->unsigned();
            $table->string('nombre');
            $table->string('capacidad');
            $table->enum('estado', ['abierto','proceso','finalizado']);
            $table->string('periodo_inicio');
            $table->string('periodo_final');
            $table->bigInteger('period_id')->unsigned();
            $table->foreign('period_id')->references('id') 
            ->on('periods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')
            ->on('activities')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('groups');
    }
}
