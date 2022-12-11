<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_tasks', function (Blueprint $table) {
            $table->bigInteger('task_id');
            $table->bigInteger('user_id');
            $table->text('result_description')->nullable();
            $table->text('result_file')->nullable();
            $table->integer('result_score')->nullable();
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
        Schema::dropIfExists('result_tasks');
    }
}
