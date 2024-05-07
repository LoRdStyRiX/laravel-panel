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
        Schema::create('toko', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('toko_name');
            $table->enum('toko_categorie', ['electronics', 'automotive', 'fashion', 'culinary', 'medicine', 'furniture', 'accesories']);
            $table->text('desc_toko');
            $table->date('open');
            $table->date('close');
            $table->time('close date');
            $table->time('open date');
            $table->boolean('status_active')->default('0');
            $table->string('toko_icon')->default('default.png');
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko');
    }
};
