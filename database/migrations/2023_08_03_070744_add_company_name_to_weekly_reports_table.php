<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyNameToWeeklyReportsTable extends Migration
{
    public function up()
    {
        Schema::table('weekly_reports', function (Blueprint $table) {
            $table->string('company_name'); // Add the company_name column
        });
    }

    public function down()
    {
        Schema::table('weekly_reports', function (Blueprint $table) {
            $table->dropColumn('company_name'); // Remove the company_name column if needed
        });
    }
}
