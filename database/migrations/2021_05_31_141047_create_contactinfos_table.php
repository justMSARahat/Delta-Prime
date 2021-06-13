<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('address');
            $table->text('email');
            $table->string('phone_one');
            $table->string('phone_two');
            $table->text('description');
            $table->text('map_api');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('dribbble');
            $table->string('behance');
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
        Schema::dropIfExists('contactinfos');
    }
}
