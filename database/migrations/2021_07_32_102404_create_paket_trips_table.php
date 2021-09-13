<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_trips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agent_id');
            $table->string('title');
            $table->bigInteger('province_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('kategori_trip_id')->unsigned();
            $table->longText('deskripsi');
            $table->bigInteger('price');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('cover_image')->default('');
            $table->string('detail_image')->default('');
            $table->string('range_date');
            $table->string('include_breakfast');
            $table->string('include_flight');
            $table->string('include_transport');
            $table->string('include_parking');
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinsis')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('kotas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kategori_trip_id')->references('id')->on('kategori_trips')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_trips');
    }
}
