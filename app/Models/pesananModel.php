<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class pesananModel extends Model{
    
    use HasFactory;
    
    protected $table = 'pesanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_stok',
        'id_pemesan',
        'nama_produk',
        'telp',
        'email',
        'alamat',
        'status_pesanan',
        'jumlah',
        'harga',
        'subtotal',
        'rating',
        'komentar',
        'created_at',
        'updated_at',
    ];
}