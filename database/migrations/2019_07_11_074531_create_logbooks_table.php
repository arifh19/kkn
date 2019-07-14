<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jenis_id');
            $table->unsignedInteger('proker_id')->nullable();
            $table->string('keterangan');
            $table->integer('waktu');
            $table->string('mulai');
            $table->string('selesai');
            $table->string('dokumentasi')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('jenis_id')->references('id')->on('jenis')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('proker_id')->references('id')->on('prokers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('logbooks');
    }
}
