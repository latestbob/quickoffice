<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficejobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officejobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('client');
            $table->text('descriptions');
            $table->string('office');
            $table->integer('amount')->nullable();
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
        Schema::dropIfExists('officejobs');
    }
}
