<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesananModel;
use Session;

class Pesanan extends Controller
{
	public function index()
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		$data['pesanan'] = pesananModel::select('*')->get();
		return view('admin/pesanan', $data);
	}

	public function action_pesanan(Request $req)
	{
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

		if($req->has('kirim')){
			pesananModel::where('id', $req->input('kirim'))->update(['status_pesanan' => 'pesanan_dikirm']);
		}

		if($req->has('terkirim')){
			pesananModel::where('id', $req->input('terkirim'))->update(['status_pesanan' => 'pesanan_terkirim']);
		}

		if($req->has('batal')){
			pesananModel::where('id', $req->input('batal'))->delete();
		}

		return redirect()->route('pesanan');
	}
}