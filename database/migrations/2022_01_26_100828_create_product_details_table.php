<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SSchema::create('products_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SKU', 25);
            $table->integer('product_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->integer('quantity')->nullable();
            $table->float('regular_price',10 ,2);
            $table->float('discounted_price',10,2);
            $table->string('feature_image',100)->nullable();
            $table->string('gallery_images',500)->nullable();
            $table->string('weight',150)->nullable();
            $table->timestamps();
        });
        Schema::table('products_details', function($table) {
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
        $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
