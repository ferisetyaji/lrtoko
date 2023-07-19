@extends('base')

@section('title', 'dashboard')
@section('menu', 'dashboard')
@section('content')

<h3>Dashboard</h3>
<hr>
<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-default dash-panel-c">
			<div class="panel-body">
				<div class="title-panel-c">Stok</div>
				<div class="content-panel-c">{{ $jml_stok }}</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default dash-panel-c">
			<div class="panel-body">
				<div class="title-panel-c">Kategori</div>
				<div class="content-panel-c">{{ $jml_kategori }}</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default dash-panel-c">
			<div class="panel-body">
				<div class="title-panel-c">Pesanan</div>
				<div class="content-panel-c">{{ $jml_pesanan }}</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default dash-panel-c">
			<div class="panel-body">
				<div class="title-panel-c">Slide</div>
				<div class="content-panel-c">{{ $jml_slide }}</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-default dash-panel-c">
			<div class="panel-body">
				<div class="title-panel-c">User</div>
				<div class="content-panel-c">{{ $jml_user }}</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default dash-panel-c">
			<div class="panel-body">
				<div class="title-panel-c">Customer</div>
				<div class="content-panel-c">{{ $jml_customer }}</div>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading" style="background-color: #fff;font-weight:600">Grafik Penjualan</div>
	<div class="panel-body">
		<div class="form-group">
			@csrf
			<select id="tahun" class="form-control" style="width:auto">
				@foreach($tahun as $t_item)
				<option>{{$t_item}}</option>
				@endforeach
			</select>
		</div>
		<br>
		<canvas id="myChart" style="width:100%;height:400px"></canvas>
	</div>
</div>

@stop
@section('jscp')

function grafik_penjualan(data_penjualan){
	var xValues1 = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
	var yValues1 = data_penjualan;
	var barColors1 = ["green","green"];
	new Chart("myChart", {
	  type: "bar",
	  data: {
	    labels: xValues1,
	    datasets: [{
	      backgroundColor: barColors1,
	      data: yValues1
	    }]
	  },
	  options: {
	    legend: {display: false},
	    title: {
	      display: false,
	      text: ""
	    }
	  }
	});
}

$.ajax({
	url: '{{ route('grafik_penjualan') }}',
	type: 'post',
	data: {
		tahun:{{ date('Y') }},
		_token: $('input[name="_token"]').val()
	},
	success: function(data){
		grafik_penjualan(data.result);
	}
});

$('#tahun').change(function(){
	var tahun = $(this).val();
	$.ajax({
		url: '{{ route('grafik_penjualan') }}',
		type: 'post',
		data: {
			tahun:tahun,
			_token: $('input[name="_token"]').val()
		},
		success: function(data){
			grafik_penjualan(data.result);
		}
	});
});
@stop