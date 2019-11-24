<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcomDepartamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acom_departament', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('acom_id')->unsigned();
            $table->foreign('acom_id')->references('id')->on('acoms')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('departament_id')->unsigned();
            $table->foreign('departament_id')->references('id')->on('departaments')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('acom_departament');
    }
}
