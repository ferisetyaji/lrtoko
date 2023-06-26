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
        Schema::create('stok', function(Blueprint $table){
            $table->id();
            $table->string('nama', 100);
            $table->text('deskripsi');
            $table->integer('harga');
            $table->integer('id_kategori');
            $table->string('kategori', 20);
            $table->string('gambar', 200);
            $table->integer('jumlah_stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('stok');
    }
};
