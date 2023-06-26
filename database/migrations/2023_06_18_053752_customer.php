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
        Schema::create('customer', function(Blueprint $table){
            $table->id();
            $table->string('username', 100);
            $table->string('password', 100);
            $table->string('nama_lengkap', 100);
            $table->string('email', 100);
            $table->string('foto', 100);
            $table->string('telp', 20);
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('customer');
    }
};
