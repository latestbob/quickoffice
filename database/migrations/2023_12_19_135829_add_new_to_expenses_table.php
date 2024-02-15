<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewToExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            //

            $table->decimal('total', 10, 2)->nullable();
            $table->json('items')->nullable();
            $table->string('approved_by')->nullable();
            $table->text('comments')->nullable();
            $table->string('status')->nullable();
            $table->string('current_month')->nullable();
            $table->string('current_year')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            //

            
        });
    }
}
