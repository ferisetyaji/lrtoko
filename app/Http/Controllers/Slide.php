<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slideModel;
use Session;

class Slide extends Controller
{
	public function index()
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		$data['slide'] = slideModel::select('*')->get();
		return view('admin/slide', $data);
	}

	public function action_slide($id = '')
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		$title = 'Tambah ';
		$action_url = 'action_tambah_slide';

		if(!empty($id)){
			$data['slide'] = slideModel::where('id', $id)->first();
			$title = 'Edit ';
			$action_url = 'action_edit_slide';
		}

		$data['title'] = $title;
		$data['action_url'] = $action_url;

		return view('admin/slide_form', $data);
	}

	public function action_tambah_slide(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		if($req->has('save')){

			$file = $req->file('gambar');
			$filename = $file->getClientOriginalName();
			$destinationPath = 'media';
      		$file->move($destinationPath,$file->getClientOriginalName());

			slideModel::create([
				'gambar' => $filename,
				'link' => $req->input('link')
			]);

			return redirect()->route('slide');
		}
	}

	public function action_edit_slide(Request $req)
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
	      		slideModel::where('id', $req->input('id'))->update(['gambar' => $filename]);
	      	}

			$kategori = kategoriModel::select('*')->where('id', $req->input('kategori'))->first();
			slideModel::where('id', $req->input('id'))->update(['link' => $req->input('link')]);

			return redirect()->route('slide');
		}
	}

	public function action_del_slide(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		slideModel::where('id', $req->input('del'))->delete();
		return redirect()->route('slide');
	}
}