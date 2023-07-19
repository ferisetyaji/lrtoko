<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stokModel;
use App\Models\kategoriModel;
use App\Models\pesananModel;
use App\Models\customerModel;
use App\Models\slideModel;
use App\Models\userModel;

use Session;
class Dashboard extends Controller
{

	public function index()
	{
		
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}

    	$pesanan = pesananModel::select('*')->first();
    	$awal = date_create($pesanan->created_at);
    	$akhir = date_create();
    	$diff  = date_diff( $awal, $akhir );

    	$tahun = [];
    	if($diff->y > 0){
    		for($d = 0; $d < $diff->y; $d++){
    			$tahun[] = date('Y', strtotime('-'.$d.' years'));
    		}
    	}else{
    		$tahun[] = date('Y');
    	}

    	$data['tahun'] = $tahun;
    	$data['jml_stok'] = stokModel::select('*')->count();
    	$data['jml_kategori'] = kategoriModel::select('*')->count();
    	$data['jml_pesanan'] = pesananModel::select('*')->count();
    	$data['jml_user'] = userModel::select('*')->count();
    	$data['jml_slide'] = slideModel::select('*')->count();
    	$data['jml_customer'] = customerModel::select('*')->count();
		return view('admin/dashboard', $data);
	}
}