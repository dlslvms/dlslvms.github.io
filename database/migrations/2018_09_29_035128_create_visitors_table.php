<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('address');
            $table->string('contact_number');
            $table->foreign('id_type')->references('id')->on('id_types')->onDelete('set null');
            $table->integer('id_type')->unsigned()->index()->nullable();
            $table->string('govid_number')->unique();
            $table->foreign('destination')->references('id')->on('destinations')->onDelete('set null');
            $table->integer('destination')->unsigned()->index()->nullable();
            $table->string('purpose');
            $table->string('accesscard_number')->unique();
            $table->string('person-in-charge')->default('none');
            $table->string('members')->default('none');
            $table->boolean('status')->default(0);
            $table->boolean('access')->default(0);
            $table->timestamp('timein_at');
            $table->timestamp('timeout_at')->nullable();
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
        Schema::dropIfExists('visitors');
    }
}
