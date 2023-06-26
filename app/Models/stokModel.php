<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class stokModel extends Model{
    
    use HasFactory;
    
    protected $table = 'stok';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama', 
        'deskripsi',
        'harga',
        'id_kategori',
        'kategori',
        'gambar',
        'jumlah_stok',
        'created_at',
        'updated_at',
    ];
}