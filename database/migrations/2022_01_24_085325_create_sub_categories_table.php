<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('name', 50);
            $table->string('image',100)->nullable();
            $table->text('description')->change();
            $table->string('status',10)->nullable();
            $table->string('note',100)->nullable();
            $table->timestamps();
        });
        Schema::table('sub_categories', function($table) {
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('sub_categories');
    }
}
