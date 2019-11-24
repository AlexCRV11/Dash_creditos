<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_value', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('activity_id')->unsigned();
            $table->bigInteger('task_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('period_id')->unsigned();
            $table->foreign('task_id')->references('id')
            ->on('tasks')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('task_value');
    }
}
