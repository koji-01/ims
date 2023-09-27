<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFloorIdToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Add the 'floor_id' column
            $table->bigInteger('floor_id')->unsigned()->nullable()->after('rack_id');
            // Add the foreign key constraint to 'floor_locations' table
            $table->foreign('floor_id')->references('id')->on('floor_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the 'floor_id' column if it exists
            $table->dropColumn('floor_id');
        });
    }
}

