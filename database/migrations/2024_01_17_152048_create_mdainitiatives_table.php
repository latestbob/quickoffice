<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdainitiativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mdainitiatives', function (Blueprint $table) {
            $table->id();
            $table->string('objectives')->nullable();
            $table->string('mda')->nullable();
            $table->string('email')->nullable();
            $table->string('initiative')->nullable();
            $table->string('outcome')->nullable();
            $table->string('date')->nullable();
            $table->string('budget')->nullable();
            $table->string('owner')->nullable();
            $table->string('support')->nullable();
            $table->string('stage')->nullable();
            $table->string('flagged')->nullable();
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
        Schema::dropIfExists('mdainitiatives');
    }
}
