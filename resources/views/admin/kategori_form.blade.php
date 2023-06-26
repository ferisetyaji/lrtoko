@extends('base')

@section('title', 'Kategori')
@section('menu', 'kategori')
@section('content')
<div class="table-content">
	<h3>{{$title}}Kategori</h3>
	<hr>
	<form method="post" action="{{ route($action_url) }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-md-8">
				<div class="form-group row">
					<label class="col-md-4">Nama</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="nama" value="{{isset($kategori->nama) ? $kategori->nama: ''}}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4"></label>
					<div class="col-md-8">
						<input type="hidden" name="id" value="{{isset($kategori->id) ? $kategori->id: ''}}">
						<button type="submit" class="btn btn-success" name="save" value="1">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@stop