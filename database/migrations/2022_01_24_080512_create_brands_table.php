<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('feature_image',100)->nullable();
            $table->text('description')->change();
            $table->string('username', 50);
            $table->string('email', 50)->nullable();
            $table->string('password', 20)->nullable();
            $table->string('contact', 30)->nullable();
            $table->string('status',10)->nullable();
            $table->string('address',20)->nullable();
            $table->string('note',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
