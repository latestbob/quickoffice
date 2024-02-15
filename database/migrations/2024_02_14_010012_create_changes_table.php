<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changes', function (Blueprint $table) {
            $table->id();
            $table->string('mda')->nullable();
            $table->string('changer_email')->nullable();
            $table->string('changer_name')->nullable();
            $table->integer('initiative_id')->nullable();
           
            $table->string('date')->nullable();
            $table->string('budget')->nullable();
            $table->string('stage')->nullable();
            $table->string('status')->nullable();
            $table->boolean('isApproved')->nullable();
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
        Schema::dropIfExists('changes');
    }
}
