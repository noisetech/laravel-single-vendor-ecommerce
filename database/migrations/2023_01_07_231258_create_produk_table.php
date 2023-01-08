<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('nama');
            $table->string('slug')->nullable();
            $table->foreignId('kategori_id');
            $table->longText('deskripsi');
            $table->integer('berat');
            $table->bigInteger('harga');
            $table->integer('ketersediaan');
            $table->integer('potongan_harga')->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')
                ->on('kategori')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
