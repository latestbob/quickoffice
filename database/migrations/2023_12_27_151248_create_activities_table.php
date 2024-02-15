<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('business')->nullable();
            $table->string('arm')->nullable();
            $table->text('task')->nullable();
            $table->text('output')->nullable();
            $table->string('due_date')->nullable();
            $table->string('week')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();

            $table->string('obligated')->nullable();
            $table->string('project')->nullable();
            $table->string('goal')->nullable();
            $table->text('comment')->nullable();
            $table->string('status')->nullable();

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
        Schema::dropIfExists('activities');
    }
}
