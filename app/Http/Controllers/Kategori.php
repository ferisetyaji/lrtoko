<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoriModel;
use Session;

class Kategori extends Controller
{
	public function index()
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		$data['kategori'] = kategoriModel::select('*')->get();
		return view('admin/kategori', $data);
	}

	public function action_kategori($id = '')
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		$title = 'Tambah ';
		$action_url = 'action_tambah_kategori';

		if(!empty($id)){
			$data['kateogri'] = kategoriModel::select('*')->where('id', $id)->first();
			$title = 'Edit ';
			$action_url = 'action_edit_kategori';
		}

		$data['title'] = $title;
		$data['action_url'] = $action_url;
		$data['katagori'] = kategoriModel::select('*')->get();

		return view('admin/kategori_form', $data);
	}

	public function action_tambah_kategori(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		if($req->has('save')){

			kategoriModel::create([
				'nama' => $req->input('nama'),
		        'slug' => implode('_', explode(' ', strtolower($req->input('nama'))))
			]);

			return redirect()->route('kategori');
		}
	}

	public function action_edit_kategori(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		if($req->has('save')){
			kategoriModel::where('id', $req->input('id'))->update([
				'nama' => $req->input('nama'),
		        'slug' => implode('_', explode(' ', strtolower($req->input('nama'))))
			]);

			return redirect()->route('kategori');
		}
	}

	public function action_del_kategori(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}
    	
		kategoriModel::where('id', $req->input('del'))->delete();
		return redirect()->route('kategori');
	}
}