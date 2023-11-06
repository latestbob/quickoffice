<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedpaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivedpays', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->integer('amount');
            $table->string('client');
            $table->text('description');
            $table->string('office');
            $table->string('accountant');
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
        Schema::dropIfExists('receivedpays');
    }
}
