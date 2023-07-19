<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stokModel;
use App\Models\kategoriModel;
use App\Models\pesananModel;
use App\Models\customerModel;

class Api extends Controller
{

	public function keranjang(Request $req)
	{
		$form_data = json_decode($req->input('keranjang'));
		$form_data1 = array_unique($form_data);
		$items = [];
		foreach($form_data1 as $item){
			$j_item = 0;
			foreach($form_data as $item1){
				if($item == $item1){
					$j_item++;
				}
			}

			$data_item = stokModel::select('*')->where('id', $item)->first();
			$data_item->jumlah = $j_item;
			$items[] = $data_item;
		}

		$items = json_encode($items);

		return response($items, 200)->header('Content-Type', 'application/json');
	}

	public function bayar(Request $req)
	{
		$data_item = json_decode($req->input('item'));
		$items = [];
		foreach($data_item as $item){
			$dt_item = stokModel::select('*')->where('id', $item->id)->first();
			$subtotal = $dt_item->harga * $item->jml;
			pesananModel::create([
				'id_stok' => $dt_item->id,
				'id_pemesan' => $req->input('id'),
				'nama_pemesan' => $req->input('full_name'),
				'nama_produk' => $dt_item->nama,
				'telp' => $req->input('telp'),
				'email' => $req->input('email'),
				'alamat' => $req->input('alamat'),
				'status_pesanan' => 'pesanan_belum_diproses',
				'jumlah' => $item->jml,
				'harga' => $dt_item->harga,
				'subtotal' => $subtotal
			]);

			$dt_item->status = 'pesanan_belum_diproses';
			$items[] = $dt_item;
		}

		$items = json_encode($items);
		return response($items, 200)->header('Content-Type', 'application/json');
	}

	public function pesanan(Request $req)
	{
		$data = pesananModel::select('*')->where('id', $req->input('id'))->get();
		$data = json_encode($data);
		return response($data, 200)->header('Content-Type', 'application/json');
	}

	public function customer(Request $req)
	{
		if(!empty($req->input('id'))){
			$cs = customerModel::select('*')->where('id', $req->input('id'))->first();
		}else{
			$cs = ['msg' => 'faild'];
		}

		$cs = json_encode($cs);
		return response($cs, 200)->header('Content-Type', 'application/json');
	}

	public function selesai(Request $req)
	{
		pesananModel::where('id', $req->input('id'))->update(['status_pesanan' => 'pesanan_selesai']);
		return response('{"result":"success"}', 200)->header('Content-Type', 'application/json');
	}

	public function ulasan(Request $req)
	{
		pesananModel::where('id', $req->input('id'))->update([
			'rating' => $req->input('rating'),
			'komentar' => $req->input('komentar')
		]);

		return response('{"result":"success"}', 200)->header('Content-Type', 'application/json');
	}

	public function grafik_penjualan(Request $req)
	{
		$tahun = $req->input('tahun');
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-01%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-02%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-03%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-04%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-05%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-06%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-07%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-08%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-09%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-10%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-11%')->count();
		$data_penjualan[] = pesananModel::select('*')->where('created_at', 'LIKE', '%'.$tahun.'-12%')->count();
		$data = json_encode(['result' => $data_penjualan]);
		return response($data, 200)->header('Content-Type', 'application/json');
	}
}