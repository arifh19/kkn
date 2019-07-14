<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prokers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('waktu');
            $table->unsignedInteger('jenis_id');
            $table->unsignedInteger('klaster_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('jenis_id')->references('id')->on('jenis')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('klaster_id')->references('id')->on('klasters')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prokers');
    }
}
