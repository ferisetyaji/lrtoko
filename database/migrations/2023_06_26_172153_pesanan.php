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
        Schema::create('pesanan', function(Blueprint $table){
            $table->id();
            $table->integer('id_stok')->nullable();
            $table->integer('id_pemesan')->nullable();
            $table->string('nama_pemesan', 100)->nullable();
            $table->string('nama_produk', 100)->nullable();
            $table->string('telp', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('alamat')->nullable();
            $table->string('status_pesanan', 50)->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('subtotal')->nullable();
            $table->integer('rating')->nullable();
            $table->text('komentar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pesanan');
    }
};
