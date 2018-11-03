<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitorlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visitor_id')->unsigned()->index()->nullable();
            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('set null');
            $table->timestamp('timein_at')->nullable();
            $table->timestamp('timeout_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitorlogs');
    }
}
