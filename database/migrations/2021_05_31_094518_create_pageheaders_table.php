<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageheadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pageheaders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('breadcrumbs');
            $table->string('page');
            $table->string('visibility')->default(1)->comment('1->Show | 2->Hide');
            $table->text('image');
            $table->text('tab')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('description')->nullable();
            $table->text('tag')->nullable();
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
        Schema::dropIfExists('pageheaders');
    }
}
