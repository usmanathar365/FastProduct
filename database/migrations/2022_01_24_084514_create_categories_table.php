<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned();   
            $table->string('name', 50)->nullable();
            $table->string('feature_image',100)->nullable();
            $table->text('description')->change();
            $table->string('status',50)->nullable();
            $table->string('note',100)->nullable();
            $table->timestamps();
        });
        Schema::table('categories', function($table) {
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
        Schema::dropIfExists('categories');
    }
}
