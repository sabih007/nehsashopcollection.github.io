<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->string('customer_name');
            $table->string('image')->default('null');
            $table->string('address');
            $table->string('order_details');
            $table->string('payment_status');
            $table->string('discount');
            $table->string('payment_method');
            $table->string('delivery_charges');
            $table->string('delivery_zone');
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
        Schema::dropIfExists('customers');
    }
};
