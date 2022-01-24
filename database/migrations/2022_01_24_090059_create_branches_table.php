<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned();
            $table->string('name', 50)->nullable();
            $table->string('location',50)->nullable()->comment('Lat, Lng');
            $table->string('description', 250)->nullable();
            $table->string('contact', 20)->nullable();
            $table->string('address',100)->nullable();
            $table->string('note',50)->nullable();
            $table->timestamps();
        });
        Schema::table('branches', function($table) {
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
        Schema::dropIfExists('branches');
    }
}
