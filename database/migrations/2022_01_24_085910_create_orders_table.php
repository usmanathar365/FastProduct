<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('order_number');
            $table->string('payment_type',20)->nullable()->comment('COD, VISA, MASTERCARD, JAZZCASH, EASYPAISA');
            $table->string('payment_status', 25)->nullable();
            $table->string('order_date', 500)->nullable();
            $table->string('ship_date', 10)->nullable();
            $table->float('delivery_charges', 10,2);
            $table->string('transaction_status',25)->nullable();
            $table->string('tracking_number',50)->nullable();
            $table->float('amount', 10,2);
            $table->float('discount', 10,2);
            $table->string('status',50)->nullable();
            $table->string('note',50)->nullable();
            $table->timestamps();
        });
        Schema::table('orders', function($table) {
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
