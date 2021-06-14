<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('favicon')->nullable();
            $table->text('logo')->nullable();
            $table->text('site_url')->nullable();
            $table->text('currency')->nullable();
            $table->text('currency_icon')->nullable();
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
        Schema::dropIfExists('webinfos');
    }
}
