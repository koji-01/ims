<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFloorIdToRestockRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restock_request', function (Blueprint $table) {
            // Add the 'floor_id' column and define it as a foreign key referencing the 'id' column of 'floor_locations' table
            $table->unsignedBigInteger('floor_id')->nullable();
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
        Schema::table('restock_request', function (Blueprint $table) {
            // Drop the foreign key constraint and remove the 'floor_id' column
            $table->dropForeign(['floor_id']);
            $table->dropColumn('floor_id');
        });
    }
}

