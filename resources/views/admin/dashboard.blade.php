@extends('base')

@section('title', 'dashboard')
@section('menu', 'dashboard')
@section('content')

<h3>Dashboard</h3>
<hr>
<div class="panel panel-default">
	<div class="panel-heading" style="background-color: #fff;font-weight:600">Grafik Jumlah Pengunjung</div>
	<div class="panel-body">
		<canvas id="myChart" style="width:100%;height:400px"></canvas>
	</div>
</div>

@stop