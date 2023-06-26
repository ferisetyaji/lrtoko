<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stokModel;
use App\Models\kategoriModel;
use Session;

class Stok extends Controller
{
	public function index()
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		$data['stok'] = stokModel::select('*')->get();
		return view('admin/stok', $data);
	}

	public function action_stok($id = '')
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		$title = 'Tambah ';
		$action_url = 'action_tambah_stok';

		if(!empty($id)){
			$data['stok'] = stokModel::select('*')->where('id', $id)->first();
			$title = 'Edit ';
			$action_url = 'action_edit_stok';
		}

		$data['title'] = $title;
		$data['action_url'] = $action_url;
		$data['katagori'] = kategoriModel::select('*')->get();

		return view('admin/stok_form', $data);
	}

	public function action_tambah_stok(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		if($req->has('save')){

			$file = $req->file('gambar');
			$filename = $file->getClientOriginalName();
			$destinationPath = 'media';
      		$file->move($destinationPath,$file->getClientOriginalName());

			$kategori = kategoriModel::select('*')->where('id', $req->input('kategori'))->first();
			stokModel::create([
				'nama' => $req->input('nama'),
		        'deskripsi' => $req->input('deskripsi'),
		        'harga' => $req->input('harga'),
		        'id_kategori' => $kategori->id,
		        'kategori' => $kategori->nama,
		        'gambar' => $filename,
		        'jumlah_stok' => $req->input('jumlah'),
			]);

			return redirect()->route('stok');
		}
	}

	public function action_edit_stok(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		if($req->has('save')){

			if($req->hasFile('gambar')){
				$file = $req->file('gambar');
				$filename = $file->getClientOriginalName();
				$destinationPath = 'media';
	      		$file->move($destinationPath,$file->getClientOriginalName());
	      		stokModel::where('id', $req->input('id'))->update(['gambar' => $filename]);
	      	}

			$kategori = kategoriModel::select('*')->where('id', $req->input('kategori'))->first();
			stokModel::where('id', $req->input('id'))->update([
				'nama' => $req->input('nama'),
		        'deskripsi' => $req->input('deskripsi'),
		        'harga' => $req->input('harga'),
		        'id_kategori' => $kategori->id,
		        'kategori' => $kategori->nama,
		        'jumlah_stok' => $req->input('jumlah'),
			]);

			return redirect()->route('stok');
		}
	}

	public function action_del_stok(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		stokModel::where('id', $req->input('del'))->delete();
		return redirect()->route('stok');
	}
}