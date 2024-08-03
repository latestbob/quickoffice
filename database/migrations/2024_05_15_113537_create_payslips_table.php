<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('pay_period')->nullable();
            $table->integer('days_work')->nullable();
            $table->decimal('annual_gross', 10, 2)->nullable();
            $table->decimal('monthly_gross', 10, 2)->nullable();
            $table->decimal('basic', 10, 2)->nullable();
            $table->decimal('housing', 10, 2)->nullable();
            $table->decimal('transport', 10, 2)->nullable();
            $table->decimal('others', 10, 2)->nullable();

            $table->decimal('paye', 10, 2)->nullable();
            $table->decimal('pension', 10, 2)->nullable();
            $table->decimal('nhf', 10, 2)->nullable();
            $table->decimal('loan', 10, 2)->nullable();

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
        Schema::dropIfExists('payslips');
    }
}
