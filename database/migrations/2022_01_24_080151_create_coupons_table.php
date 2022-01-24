<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 100);
            $table->text('description')->change();
            $table->string('discount_type',15)->nullable()->comment('Cart discount, Percentage Discount, Flat Discount');
            $table->float('coupon_amount', 25)->nullable();
            $table->string('allow_free_shipping', 20)->nullable();
            $table->string('expiry_date', 10)->nullable();
            $table->string('usage_limit',100)->nullable();
            $table->string('usage_restrictions_products',100)->nullable();
            $table->string('usage_restrictions_categories',100)->nullable();
            $table->string('usage_restrictions_brands',100)->nullable();
            $table->string('usage_by_users',100)->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
