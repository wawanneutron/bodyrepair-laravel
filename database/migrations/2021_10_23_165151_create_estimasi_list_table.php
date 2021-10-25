<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimasiListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimasi_price_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estimasi_id');
            $table->unsignedBigInteger('price_list_id');
            $table->timestamps();

            $table->foreign('estimasi_id')->references('id')->on('estimasis');
            $table->foreign('price_list_id')->references('id')->on('price_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimasi_list');
    }
}
