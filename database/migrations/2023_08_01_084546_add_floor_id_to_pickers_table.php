<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFloorIdToPickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pickers', function (Blueprint $table) {
            // Add the 'floor_id' column and make it nullable
            $table->unsignedBigInteger('floor_id')->nullable();

            // Add a foreign key constraint to reference the 'id' column in the 'floor_locations' table
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
        Schema::table('pickers', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['floor_id']);

            // Drop the 'floor_id' column
            $table->dropColumn('floor_id');
        });
    }
}
