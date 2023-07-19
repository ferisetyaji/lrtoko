<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Stok;
use App\Http\Controllers\Kategori;
use App\Http\Controllers\Pesanan;
use App\Http\Controllers\User;
use App\Http\Controllers\Slide;
use App\Http\Controllers\Api;
use App\Http\Controllers\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Home::class, 'home'])->name('home');
Route::get('produk/{id}', [Home::class, 'produk']);
Route::get('login', [Home::class, 'login'])->name('login');
Route::post('action_login', [Home::class, 'action_login'])->name('action_login');
Route::get('register', [Home::class, 'register'])->name('register');
Route::post('action_register', [Home::class, 'action_register'])->name('action_register');
Route::get('logout', [Home::class, 'logout'])->name('logout');

//akses
Route::get('admin/login', [User::class, 'login'])->name('admin_login');
Route::post('admin/action_login', [User::class, 'action_login'])->name('action_admin_login');
Route::get('admin/logout', [User::class, 'logout'])->name('admin_logout');

//Dashboard
Route::get('admin/', [Dashboard::class, 'index'])->name('dashboard');

//Stok
Route::get('admin/stok', [Stok::class, 'index'])->name('stok');
Route::get('admin/tambah_stok', [Stok::class, 'action_stok'])->name('tambah_stok');
Route::post('admin/action_tambah_stok', [Stok::class, 'action_tambah_stok'])->name('action_tambah_stok');
Route::get('admin/edit_stok/{id}', [Stok::class, 'action_stok'])->name('edit_stok');
Route::post('admin/action_edit_stok}', [Stok::class, 'action_edit_stok'])->name('action_edit_stok');
Route::post('admin/action_del_stok}', [Stok::class, 'action_del_stok'])->name('action_del_stok');

//kategori
Route::get('admin/kategori', [Kategori::class, 'index'])->name('kategori');
Route::get('admin/tambah_kategori', [Kategori::class, 'action_kategori'])->name('tambah_kategori');
Route::post('admin/action_tambah_kategori', [Kategori::class, 'action_tambah_kategori'])->name('action_tambah_kategori');
Route::get('admin/edit_kategori/{id}', [Kategori::class, 'action_kategori'])->name('edit_kategori');
Route::post('admin/action_edit_kategori}', [Kategori::class, 'action_edit_kategori'])->name('action_edit_kategori');
Route::post('admin/action_del_kategori}', [Kategori::class, 'action_del_kategori'])->name('action_del_kategori');

//pesanan
Route::get('admin/pesanan', [Pesanan::class, 'index'])->name('admin_pesanan');
Route::post('admin/action_pesanan', [Pesanan::class, 'action_pesanan'])->name('action_pesanan');

//user
Route::get('admin/user', [User::class, 'index'])->name('user');
Route::get('admin/tambah_user', [User::class, 'action_user'])->name('tambah_user');
Route::post('admin/action_tambah_user', [User::class, 'action_tambah_user'])->name('action_tambah_user');
Route::get('admin/edit_user/{id}', [User::class, 'action_user'])->name('edit_user');
Route::post('admin/action_edit_user}', [User::class, 'action_edit_user'])->name('action_edit_user');
Route::post('admin/action_del_user}', [User::class, 'action_del_user'])->name('action_del_user');

//slide
Route::get('admin/slide', [Slide::class, 'index'])->name('slide');
Route::get('admin/tambah_slide', [Slide::class, 'action_slide'])->name('tambah_slide');
Route::post('admin/action_tambah_slide', [Slide::class, 'action_tambah_slide'])->name('action_tambah_slide');
Route::get('admin/edit_slide/{id}', [Slide::class, 'action_slide'])->name('edit_slide');
Route::post('admin/action_edit_slide}', [Slide::class, 'action_edit_slide'])->name('action_edit_slide');
Route::post('admin/action_del_slide}', [Slide::class, 'action_del_slide'])->name('action_del_slide');

//api
Route::post('keranjang', [Api::class, 'keranjang'])->name('keranjang');
Route::post('bayar', [Api::class, 'bayar'])->name('bayar');
Route::post('pesanan', [Api::class, 'pesanan'])->name('pesanan');
Route::post('customer', [Api::class, 'customer'])->name('customer');
Route::post('selesai', [Api::class, 'selesai'])->name('selesai');
Route::post('ulasan', [Api::class, 'ulasan'])->name('ulasan');
Route::post('grafik_penjualan', [Api::class, 'grafik_penjualan'])->name('grafik_penjualan');