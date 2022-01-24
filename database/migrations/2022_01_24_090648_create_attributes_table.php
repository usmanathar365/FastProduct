<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned();
            $table->string('name',15)->nullable();
            $table->string('values',250)->nullable()->comment('ColorIDs, SizeIDs');
            $table->string('note',100)->nullable();
            $table->timestamps();
        });
        Schema::table('attributes', function($table) {
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
        Schema::dropIfExists('attributes');
    }
}
