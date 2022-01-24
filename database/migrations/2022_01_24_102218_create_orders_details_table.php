<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_details', function (Blueprint $table) {
        $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('product_details_id')->unsigned();
            $table->integer('quantity')->nullable();
            $table->float('amount',10 ,2);
            $table->string('status',25)->nullable();
            $table->timestamps();
        });
        Schema::table('orders_details', function($table) {
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('product_details_id')->references('id')->on('products_details')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_details');
    }
}
