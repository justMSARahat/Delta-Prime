<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('desc');
            $table->string('btn_text');
            $table->string('btn_link');
            $table->string('subtitle')->nullable()->comment('This is for Banner');
            $table->string('price')->nullable()->comment('This is for Banner');
            $table->integer('status')->default(2)->comment('1-Active | 2-Inactive');
            $table->integer('position')->comment('1-left | 2-right');
            $table->text('image')->nullable();
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
        Schema::dropIfExists('baners');
    }
}
