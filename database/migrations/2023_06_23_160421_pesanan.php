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
            $table->integer('id_stok');
            $table->integer('id_pemesan');
            $table->string('nama_pemesan', 100);
            $table->string('nama_produk', 100);
            $table->string('telp', 20);
            $table->string('email', 100);
            $table->text('alamat');
            $table->string('status_pesanan', 50);
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->integer('rating');
            $table->text('komentar');
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
