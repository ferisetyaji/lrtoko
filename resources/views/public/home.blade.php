@extends('public')

@section('title', 'Home')
@section('content')
<div class="container body-content">
	<div class="slidep">
	@foreach($slide as $sl_item)
	  <div class="slidep-img">
	  	<div class="slidep-img-1">
	  		<img src="{{ asset('media/'.$sl_item->gambar) }}">
	  	</div>
	  </div>
	@endforeach
	</div>
	<br><br><br>
	<div class="row">
		@foreach($stok as $st_item)
		<div class="col-sm-4">
			<div class="stok-item">
				<a href="{{ url('produk/'.$st_item->id) }}" class="stok-link"></a>
				<div class="stok-img">
					<div class="stok-img-1">
						<img src="{{ asset('media/'.$st_item->gambar) }}" style="height:100%">
					</div>
				</div>
				<div class="stok-detail">
					<div class="stok-nama">{{ $st_item->nama }}</div>
					<div class="stok-harga">Rp. {{ number_format($st_item->harga) }}</div>
					<div class="stok-ac">
						<div class="stok-suka tidak-suka-item suka-{{$st_item->id}}" data-id="{{$st_item->id}}">
							<i class="fas fa-heart"></i>
						</div>
						<button type="button" class="btn stok-beli tambah-keranjang beli-{{$st_item->id}}" data-id="{{$st_item->id}}">Beli</button>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@stop