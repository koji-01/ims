<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedSmallInteger('week_number');
            $table->unsignedInteger('total_inflow_quantity');
            $table->unsignedInteger('total_outflow_quantity');
            $table->unsignedInteger('net_change_quantity');
            $table->unsignedInteger('remaining_quantity');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_reports');
    }
}
