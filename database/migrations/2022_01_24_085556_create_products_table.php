<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('PSKU', 25);
            $table->integer('brand_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->integer('group_id');
            $table->string('name', 100);
            $table->text('description')->change();
            $table->string('short_description', 500)->nullable();
            $table->string('meterial', 20)->nullable();
            $table->string('type', 10)->nullable();
            $table->string('attributes',10);
            $table->integer('rank')->nullable();
            $table->string('note',100)->nullable();
            $table->string('feature_image',100)->nullable();
            $table->string('cross_sell_products',20)->nullable();
            $table->string('up_sell_products',20)->nullable();
            $table->string('meta_tags',50)->nullable();
            $table->string('meta_title',50)->nullable();
            $table->string('meta_description',250)->nullable();
            $table->string('title_description',250)->nullable();
            $table->string('keywords',150)->nullable();
            $table->string('url',50)->nullable();
            $table->string('stauts',15)->nullable()->comment('Draft, Published');
            $table->timestamps();
        });
        Schema::table('products', function($table) {
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
        $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
