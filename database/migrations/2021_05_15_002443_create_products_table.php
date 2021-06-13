<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->text('title');
            $table->text('slug');
            $table->text('short_desc');
            $table->text('desc');
            $table->string('price');
            $table->string('offer_price')->nullable();
            $table->string('quantity');
            $table->string('sku')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimention')->nullable();
            $table->integer('featured')->default(2)->comment('1-Yes | 2-No');
            $table->integer('status')->default(2)->comment('1-Active | 2-Inactive');
            $table->integer('brand')->default(0)->comment('0-No Brand')->nullable();
            $table->integer('category')->default(0)->comment('0-Pending');
            $table->text('primary');
            $table->text('second_image')->nullable();
            $table->text('third_image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
