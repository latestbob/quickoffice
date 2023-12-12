<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string("fullname");
            $table->string("email");
            $table->string("position");
            $table->string("emergency_contact");
            $table->string("type");
            $table->integer("applicable_days")->nullable();
            $table->integer("requested_days");
            $table->string("start");
            $table->string("end");
            $table->string("status")->nullable();
            $table->string("comment")->nullable();
            $table->string("approved_by")->nullable();
            $table->string("year")->nullable();
            $table->string("ref")->nullable();
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
        Schema::dropIfExists('leaves');
    }
}
