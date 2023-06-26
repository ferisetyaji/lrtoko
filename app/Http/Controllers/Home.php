<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stokModel;
use App\Models\slideModel;
use App\Models\kategoriModel;
use App\Models\pesananModal;
use App\Models\customerModel;
use Session;

class Home extends Controller
{
	public function home()
	{
		$data['stok'] = stokModel::select('*')->get();
		$data['slide'] = slideModel::select('*')->get();

		return view('public/home', $data);
	}

	public function produk($id)
	{
		$data['stok'] = stokModel::select('*')->where('id', $id)->first();
		return view('public/produk', $data);
	}

	public function checkout()
	{
		return view('public/checkout');
	}

	public function register()
	{
		return view('public/register');
	}

	public function action_register(Request $req)
	{
		if($req->has('save')){

			customerModel::create([
				'username' => $req->input('username'),
				'password' => $req->input('password'),
				'nama_lengkap' => $req->input('nama_lengkap'),
				'email' => $req->input('email'),
				'foto' => 'default',
				'telp' => $req->input('telp'),
				'alamat' => $req->input('alamat')
			]);

			return redirect()->route('home');
		}
	}

	public function login()
	{
		return view('public/login');
	}

	public function action_login(Request $req)
	{
		$msg = '';
		if($req->has('username')){
			$user = customerModel::select('*')->where('username', $req->username)->first();
			if(!empty($user)){
				if($user->password == $req->input('password')){
					$msg = 'sukses';
					Session::put('id', $user->id);
					$code = 200;
				}else{
					$msg = 'Password salah';
					$code = 401;
				}
			}else{
				$msg = 'Akun tidak valid';
				$code = 401;
			}
		}else{
			$msg = 'Login tidak valid';
			$code = 401;
		}

		$data['message'] = $msg;

		$respon = json_encode($data);
		
		return response($respon, $code)->header('Content-Type', 'application/json');
	}

	public function logout()
	{
		Session::forget('id');
		return redirect()->route('login');
	}
}