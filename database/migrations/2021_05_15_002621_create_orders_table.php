<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('invoice');
            $table->integer('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('address_one');
            $table->string('address_two')->nullable();
            $table->integer('country');
            $table->integer('city');
            $table->integer('state');
            $table->string('post_code');
            $table->string('amount');
            $table->integer('status')->comment('1-Prossesing,2-Shiped,3-Delivered,4-Canceled');
            $table->integer('payment_method')->nullable()->comment('1-paypal,2-omeso');
            $table->string('payment_invoice')->nullable();
            $table->integer('payment')->nullable()->comment('1-success,2-pending,3-cancel');
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
