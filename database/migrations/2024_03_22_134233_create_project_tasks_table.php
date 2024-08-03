<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('milestone')->nullable();
            $table->string('project');
            $table->string('title')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->text('responsible')->nullable();
            $table->integer('percentage')->nullable();
            $table->string('stage')->nullable();
            $table->string('status')->nullable();
            $table->string('actual_date')->nullable();
            $table->string('team')->nullable();
            $table->text('output')->nullable();
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
        Schema::dropIfExists('project_tasks');
    }
}
