<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengerjaanGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengerjaan_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengerjaan_id');
            $table->unsignedBigInteger('booking_id');
            $table->string('nama_pengerjaan');
            $table->string('images');
            $table->enum('status', array('proses', 'selesai'))->default('proses');
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
        Schema::dropIfExists('pengerjaan_galleries');
    }
}
