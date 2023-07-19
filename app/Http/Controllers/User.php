<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use Session;

class User extends Controller
{
	public function index()
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		$data['user'] = userModel::select('*')->get();
		return view('admin/user', $data);
	}

	public function action_user($id = '')
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		$title = 'Tambah ';
		$action_url = 'action_tambah_user';

		if(!empty($id)){
			$data['user'] = userModel::where('id', $id)->first();
			$title = 'Edit ';
			$action_url = 'action_edit_user';
		}

		$data['title'] = $title;
		$data['action_url'] = $action_url;

		return view('admin/user_form', $data);
	}

	public function action_tambah_user(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		if($req->has('save')){

			userModel::create([
				'username' => $req->input('username'),
		        'password' => $req->input('password')
			]);

			return redirect()->route('user');
		}
	}

	public function action_edit_user(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		if($req->has('save')){
			userModel::where('id', $req->input('id'))->update(['nama' => $req->input('nama')]);
			if($req->has('password')){
				userModel::where('id', $req->input('id'))->update(['password' => $req->input('password')]);
			}
			return redirect()->route('user');
		}
	}

	public function action_del_user(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		userModel::where('id', $req->input('del'))->delete();
		return redirect()->route('user');
	}

	public function login()
	{
		return view('admin/login');
	}

	public function action_login(Request $req)
	{
		$msg = '';
		if($req->has('username')){
			$user = userModel::select('*')->where('username', $req->username)->first();
			if(!empty($user)){
				if($user->password == $req->input('password')){
					$msg = 'sukses';
					Session::put([
						'admin' => $user->id,
						'admin_nama' => $user->username
					]);
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
		Session::forget('admin');
		Session::forget('admin_nama');

		return redirect()->route('admin_login');
	}
}