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
    	<div class="container form-register" style="max-width:300px">
            <form method="post">
        		<div class="mb-5">
        			<div class="logo-register text-center">
        				<i class="fas fa-user"></i>
        			</div>
        			<div class="title-register text-center">Selamat datang</div>
        			<div class="title-register-1 text-center">Silahkan masuk di lrtoko dan happy belanja</div>
        		</div>
        		<div class="mb-3">
        			<label>Username</label>
        			<input type="text" class="form-control" id="username" name="username">
        		</div>
        		<div class="mb-3">
        			<label>Password</label>
        			<input type="password" class="form-control" id="password" name="password">
        		</div>
                <div class="mb-3">
                    @csrf
                    <div class="pesan-login" style="color:red"></div>
                    <button type="button" id="submit-login" class="btn btn-primary pull-width db" name="save" value="1">Masuk</button>
                </div>
                <div class="mb-3">
                    <a href="{{ route('register') }}" class="btn btn-primary pull-width db">Daftar</a>
                </div>
                <div class="mb-3">
                    <a href="{{ route('home') }}" class="btn btn-primary pull-width db">Halaman Utama</a>
                </div>
            </form>
    	</div>
        <footer>
            <p class="text-footer">&copy;Copyright <span class="tgl-copy"></span> by Feri Setyaji</p>
        </footer>
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap5.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/numeral.js') }}"></script>
        <script type="text/javascript">

            $('#submit-login').click(function(){
                var username = $('#username').val();
                var password = $('#password').val();

                $.ajax({
                    url: '{{ route("action_login") }}',
                    type: 'post',
                    data: {
                        username: username,
                        password: password,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(data){
                        if(data.message == 'sukses'){
                            window.location.href = "{{ route('home') }}";
                        }else{
                            $('.pesan-login').html('<ul><li>'+data.message+'</li></ul>');
                        }
                    }
                });
            });

        </script>
    </body>
</html>