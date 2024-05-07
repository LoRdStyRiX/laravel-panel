<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_toko')->unsigned();
            $table->integer('id_category')->unsigned();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('image');
            $table->string('price');
            $table->text('descrption');
            $table->integer('stock');
            $table->string('color')->nullable();
            $table->foreign('id_toko')->on('toko')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_category')->on('categorie')->references('id')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
