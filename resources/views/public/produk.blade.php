@extends('public')

@section('title', 'Produk')
@section('content')

<div class="container body-content">
	<div class="row">
		<div class="col-md-6">
			<div class="produk-img">
				<div class="produk-imgcase">
					<img src="{{ asset('media/'.$stok->gambar) }}">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group produk-detail">
				<div class="mb-3">
					<div class="produk-nama">{{$stok->nama}}</div>
				</div>
				<div class="mb-3">
					<label class="from-label">Harga</label>
					<div class="produk-harga">Rp. {{ number_format($stok->harga) }}</div>
				</div>
				<div class="mb-3">
					<label>Kategori</label>
					<div>{{$stok->kategori}}</div>
				</div>
				<div class="mb-3">
					<label>Deskripsi</label>
					<div class="produk-deskripsi">{{$stok->deskripsi}}</div>
				</div>
				<div class="mb-3"><i>Masih tersedia sekitar {{$stok->jumlah_stok}} stok</i></div>
			</div>
			<div class="produk-btn">
				<button type="button" class="btn btn-produk btn-keranjang tambah-keranjang" data-id="{{$stok->id}}">Tambah Keranjang</button>
			</div>
		</div>
	</div>
</div>
@stop