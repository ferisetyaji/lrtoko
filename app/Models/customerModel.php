<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class customerModel extends Model{
    
    use HasFactory;
    
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'username',
        'password',
        'nama_lengkap',
        'email',
        'foto',
        'telp',
        'alamat', 
        'created_at',
        'updated_at',
    ];
}