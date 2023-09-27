<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWeekNumberToOrders extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Add the week_number column to store the week number of each order
            $table->unsignedSmallInteger('week_number')->after('created_at')->nullable();
        });

        // Calculate and update the week numbers for existing orders
        $orders = \App\Models\Order::all();
        foreach ($orders as $order) {
            // Calculate the week number based on the order's created_at date
            $weekNumber = date('W', strtotime($order->created_at));
            $order->week_number = $weekNumber;
            $order->save();
        }
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Remove the week_number column if needed
            $table->dropColumn('week_number');
        });
    }
}
