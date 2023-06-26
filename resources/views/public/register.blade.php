<!DOCTYPE html>
<html lang="en" style="position:relative;min-height:100%;background-color:#fff">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DJTOKO - Register Akun</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/public.css') }}">
    </head>
    <body style="background-color:#fff">
    	<div class="container form-register">
            <form method="post" action="{{ route('action_register') }}">
                @csrf
        		<div class="mb-5">
        			<div class="logo-register text-center">
        				<i class="fas fa-user"></i>
        			</div>
        			<div class="title-register text-center">Selamat datang</div>
        			<div class="title-register-1 text-center">Silahkan mendaftar di lrtoko dan happy belanja</div>
        		</div>
        		<div class="mb-3">
        			<label>Username</label>
        			<input type="text" class="form-control" name="username">
        		</div>
        		<div class="mb-3">
        			<label>Nama Lengkap</label>
        			<input type="text" class="form-control" name="nama_lengkap">
        		</div>
        		<div class="mb-3">
        			<label>Email</label>
        			<input type="text" class="form-control" name="email">
        		</div>
        		<div class="mb-3">
        			<label>Telp</label>
        			<input type="text" class="form-control" name="telp">
        		</div>
        		<div class="mb-3">
        			<label>Alamat</label>
        			<input type="text" class="form-control" name="alamat">
        		</div>
        		<div class="mb-3">
        			<label>Password</label>
        			<input type="password" class="form-control" id="password" name="password">
        		</div>
        		<div class="mb-3">
        			<label>Confirm Password</label>
        			<input type="password" class="form-control" id="pass-confirm" name="confirm">
        		</div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-register" name="save" value="1">Daftar Sekarang</button>
                </div>
            </form>
    	</div>
        <footer>
            <p class="text-footer">&copy;Copyright <span class="tgl-copy"></span> by Source box Team</p>
        </footer>
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap5.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/numeral.js') }}"></script>
        <script type="text/javascript">
            $('#pass-confirm').key(function(){
                var pass = $('#password').val();
                var confirm = $(this).val();
                if(pass == confirm){
                    alert('Password tidak sama');
                }
            });
        </script>
    </body>
</html>