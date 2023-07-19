<!DOCTYPE html>
<html lang="en" style="position:relative;min-height:100%;background-color:#fff">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LRTOKO - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/public.css') }}">
        <style type="text/css">
            .rating{
                font-size:1.2em;
                display:inline-block;
            }
            .rating-s i{
                color:orange;
            }
        </style>
    </head>
    <body style="background-color:#fff">
        <div class="top-bar">
            <div class="container">
                <div class="top-tool">
                    <div class="tool-menu navbar-img" style="padding-top:6px">
                        <div class="drop-bar">
                            <img src="{{ asset('img/default.png') }}" style="height:25px">
                        </div>
                        <div class="dropmenu">
                            <div class="dropmenu-in">
                                <div class="mb-3">
                                    <div class="text-center" style="font-size: 3em;"><i class="fas fa-user"></i></div>
                                </div>
                                <div class="mb-3 text-center" id="opsi-nama"></div>
                                <div id="keluar" class="btn btn-primary" style="display:block;width:200px;margin:0 auto">Keluar</div>
                            </div>
                        </div>
                    </div>
                    <a class="tool-menu" id="suka"><i class="fas fa-heart"></i> <span id="j-suka" style="color:orange">0</span></a>
                    <a class="tool-menu" id="pesanan"><i class="fas fa-truck"></i> <span id="j-pesanan" style="color:orange">0</span></a>
                    <a class="tool-menu" id="keranjang"><i class="fas fa-shopping-cart"></i> <span id="j-keranjang" style="color:orange">0</span></a>
                    <input type="text" class="form-search" style="width:329px" placeholder="Cari Produk">
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @yield('content')
        <footer>
            <p class="text-footer">&copy;Copyright <span class="tgl-copy"></span> by SBF Team</p>
        </footer>
        <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div style="font-size:1.1em;text-align: center;padding:25px 0;">Silahkan login / daftar terlebih dahulu untuk melakukan transaksi.</div>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-primary" style="display:block;width:100px;margin:0 auto">Tutup</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="keranjang-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keranjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <table class="table">
                       <tbody class="list-keranjang"></tbody>
                    </table>
                </div>
                <div class="keranjang-btn">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="float:right">Keluar</button>
                    <button type="button" class="btn btn-primary" id="bayar-sekarang" style="float:right;margin-right:4px;">Bayar Sekarang</button>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="pesanan-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="list-pesanan"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="suka-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suka</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="list-suka"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="opsi-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Opsi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="ulasan-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ulasan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <span class="rating rating-1" data-id="1"><i class="fas fa-star"></i></span>
                    <span class="rating rating-2" data-id="2"><i class="fas fa-star"></i></span>
                    <span class="rating rating-3" data-id="3"><i class="fas fa-star"></i></span>
                    <span class="rating rating-4" data-id="4"><i class="fas fa-star"></i></span>
                    <span class="rating rating-5" data-id="5"><i class="fas fa-star"></i></span>
                    <input type="hidden" id="rating-komentar">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="text-komentar" rows="3" placeholder="Komentar"></textarea>
                </div>
                <button type="button" class="btn btn-primary" id="simpan-komentar" style="float:right">Simpan</button>
              </div>
            </div>
          </div>
        </div>
        @csrf
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap5.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/numeral.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/public.js') }}"></script>
        <script type="text/javascript">

            var keranjangModal = new bootstrap.Modal(document.getElementById('keranjang-modal'), {
                keyboard: false
            });

            var pesananModal = new bootstrap.Modal(document.getElementById('pesanan-modal'), {
                keyboard: false
            });

            var opsiModal = new bootstrap.Modal(document.getElementById('opsi-modal'), {
                keyboard: false
            });

            var ulasanModal = new bootstrap.Modal(document.getElementById('ulasan-modal'), {
                keyboard: false
            });

            var loginModal = new bootstrap.Modal(document.getElementById('login-modal'), {
                keyboard: false
            });

            var sukaModal = new bootstrap.Modal(document.getElementById('suka-modal'), {
                keyboard: false
            });

            $('#keluar').click(function(){
                localStorage.removeItem('full_name');
                localStorage.removeItem('user_name');
                localStorage.removeItem('alamat');
                localStorage.removeItem('id');
                localStorage.removeItem('email');
                localStorage.removeItem('telp');
                window.location.href = "{{ route('logout') }}";
            });

            countOrder();

            $('#opsi-nama').text(localStorage.getItem('user_name'));

            $('.slidep').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true
            });


            $('.tambah-keranjang').click(function(){
                var id_session = '{{ Session::get("id") }}';
                if(id_session == ''){
                    loginModal.show();
                    return;
                }
                var data = localStorage.getItem('keranjang') != undefined ? JSON.parse(localStorage.getItem('keranjang')): [];
                var id = $(this).attr('data-id');
                data.push(id);
                data = JSON.stringify(data);
                localStorage.setItem('keranjang', data);
                countCart();
            });

            $(document).on('click', '.tambah-keranjang-suka', function(){
                var id_session = '{{ Session::get("id") }}';
                if(id_session == ''){
                    loginModal.show();
                    return;
                }
                var data = localStorage.getItem('keranjang') != undefined ? JSON.parse(localStorage.getItem('keranjang')): [];
                var id = $(this).attr('data-id');
                data.push(id);
                data = JSON.stringify(data);
                localStorage.setItem('keranjang', data);
                countCart();
            });


            $('#keranjang').click(function(){
                var keranjang = localStorage.getItem('keranjang');

                $.ajax({
                    url:'{{ route("keranjang") }}',
                    type: 'post',
                    data: {
                        keranjang: keranjang,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(data){
                        var item = '';
                        for(var i = 0; i < data.length; i++){
                            var cart = localStorage.getItem('keranjang');
                            var jml_cart = 0;
                            for(var a = 0; a < cart.length; a++){
                                jml_cart += cart[a] == data[i].id ? 1: 0;
                            }

                            item += '\
                            <tr class="cart-item-'+data[i].id+'">\
                                <td>\
                                    <div>'+data[i].nama+'<div>\
                                    <div style="font-size: 0.8em;color: orange;">Rp. '+numeral(data[i].harga).format('0,0')+'<div>\
                                </td>\
                                <td style="width:183px;">\
                                    <div style="float:right">\
                                        <button type="button" class="btn btn-primary btn-sm plus-cart" data-id="'+data[i].id+'" style="padding-bottom: 2px;"><i style="color:#fff" class="fas fa-plus"></i></button>\
                                        <div class="btn btn-sm item-cart jml-cart-'+data[i].id+'" data-id="'+data[i].id+'" data-jml="'+jml_cart+'">'+jml_cart+'</div>\
                                        <button type="button" class="btn btn-danger btn-sm min-cart" data-id="'+data[i].id+'" style="padding-bottom: 2px;"><i style="color:#fff" class="fas fa-minus"></i></button>\
                                    </div>\
                                </td>\
                            </tr>';
                        }
                        $('.list-keranjang').html(item);

                        if(item == ''){
                            $('.list-keranjang').html('<div style="text-align:center">Keranjang kosong</div>');
                            $('.keranjang-btn').hide();
                        }else{
                            $('.list-keranjang').html(item);
                            $('.keranjang-btn').show();
                        }
                    }
                });
                keranjangModal.show();
                countCart();
            });

            $('#pesanan').click(function(){
                var id = localStorage.getItem('id');
                $.ajax({
                    url: '{{ route("pesanan") }}',
                    type: 'post',
                    data: {
                        id:id,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(data){
                        var item = '';
                        var jmlKeranjang = 0;
                        for(var i = 0; i < data.length; i++){
                            if(data[i].rating <= 0){
                                jmlKeranjang++;
                                var progres = '';
                                switch(data[i].status_pesanan){
                                    case 'pesanan_belum_diproses': progres = 10; break;
                                    case 'pesanan_dikirim': progres = 50; break;
                                    case 'pesanan_terkirim': progres = 90; break;
                                }
                                if(data[i].status_pesanan != 'pesanan_terkirim'){
                                    progres = '<div>'+data[i].status_pesanan+'</div>\
                                            <div class="progress">\
                                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: '+progres+'%" aria-valuenow="'+progres+'" aria-valuemin="0" aria-valuemax="100"></div>\
                                            </div>';
                                }else{
                                    progres = '<button type="button" class="btn btn-warning btn-block selesai" data-id="'+data[i].id+'">Selesai</button>';
                                }
                                progres = data[i].status_pesanan == 'pesanan_selesai' ? '<button type="button" class="btn btn-warning btn-block ulasan" data-id="'+data[i].id+'">Ulasan</button>': progres;
                                item += '\
                                <div class="mb-3">\
                                    <div class="row">\
                                        <div class="col-7">\
                                            <div>'+data[i].nama_pemesan+'</div>\
                                            <div><strong>'+data[i].jumlah+' pcs,</strong> Harga Rp. '+data[i].harga+'</div>\
                                        </div>\
                                        <div class="col-5">'+progres+'</div>\
                                    </div>\
                                </div><hr>';
                            }
                        }
                        item = item == '' ? '<div style="text-align:center">Pesanan Kosong.</div><br>': item;
                        $('.list-pesanan').html(item);
                        pesananModal.show();
                        document.querySelector('#j-pesanan').innerHTML = jmlKeranjang;
                    }
                });
                
            });

            function countOrder(){

                var id = localStorage.getItem('id');
                $.ajax({
                    url: '{{ route("pesanan") }}',
                    type: 'post',
                    data: {
                        id:id,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(data){
                        var item = '';
                        var jmlKeranjang = 0;
                        for(var i = 0; i < data.length; i++){
                            if(data[i].rating <= 0){
                                jmlKeranjang++;
                            }
                        }
                        
                        document.querySelector('#j-pesanan').innerHTML = jmlKeranjang;
                    }
                });
            }

            $('#suka').click(function(){
                var keranjang = localStorage.getItem('suka');

                $.ajax({
                    url:'{{ route("keranjang") }}',
                    type: 'post',
                    data: {
                        keranjang: keranjang,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(data){
                        var item = '';
                        for(var i = 0; i < data.length; i++){
                            var cart = localStorage.getItem('suka');
                            var jml_cart = 0;
                            for(var a = 0; a < cart.length; a++){
                                jml_cart += cart[a] == data[i].id ? 1: 0;
                            }

                            item += '\
                            <div class="mb-3">\
                                <div class="row">\
                                    <div class="col-8">\
                                        <div>'+data[i].nama+'</div>\
                                        <div style="font-size: 0.8em;color: orange;">Rp. '+numeral(data[i].harga).format('0,0')+'</div>\
                                    </div>\
                                    <div class="col-4">\
                                        <button type="button" class="btn stok-beli tambah-keranjang-suka beli-'+data[i].id+'" data-id="'+data[i].id+'" style="float:right">Beli</button>\
                                    </div>\
                                </div>\
                            </div>';
                        }
                        $('.list-suka').html(item);
                    }
                });
                sukaModal.show();
            });

            $('#bayar-sekarang').click(function(){
                var full_name = localStorage.getItem('full_name');
                var alamat = localStorage.getItem('alamat');
                var id = localStorage.getItem('id');
                var email = localStorage.getItem('email');
                var telp = localStorage.getItem('telp');
                var item = document.getElementsByClassName('item-cart');
                var itemData = [];
                for(var i = 0; i < item.length; i++){
                    itemData.push({
                        'id':item[i].getAttribute('data-id'),
                        'jml':item[i].getAttribute('data-jml')
                    });
                }
                itemData = JSON.stringify(itemData);
                $.ajax({
                    url:'{{ route("bayar") }}',
                    type:'post',
                    data:{
                        full_name:full_name,
                        email:email,
                        telp:telp,
                        alamat:alamat,
                        id:id,
                        item:itemData,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(data){
                        localStorage.removeItem('keranjang');
                        var item = JSON.stringify(data.item);
                        localStorage.setItem('pesanan', item);
                        countCart();
                        countOrder()
                        keranjangModal.hide();
                        pesananModal.show();
                    }
                });
            });

            $.ajax({
                url: "{{ route('customer') }}",
                type: 'post',
                data: {
                    id: "{{ Session::get('id') }}",
                    _token: $('input[name="_token"]').val()
                },
                success: function(data){
                    console.log(data);
                    if(data.msg == 'faild'){
                        $('.top-tool').html('\
                            <a href="{{ route("login") }}" class="tool-menu"\
                                <div>Masuk</div>\
                            </a>\
                            <input type="text" class="form-search" style="width:329px" placeholder="Cari Produk"><div class="clearfix"></div>');
                    }else{
                        localStorage.setItem('full_name', data.nama_lengkap);
                        localStorage.setItem('user_name', data.username);
                        localStorage.setItem('alamat', data.alamat);
                        localStorage.setItem('id', data.id);
                        localStorage.setItem('email', data.email);
                        localStorage.setItem('telp', data.telp);
                        $('#top-user-name').text(data.username);
                    }
                }
            });

            $(document).on('click', '.selesai', function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '{{ route("selesai") }}',
                    type: 'post',
                    data: {
                        id:id,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(){
                        window.location.reload();
                    }
                });
            });

            $(document).on('click', '.ulasan', function(){
                var id = $(this).attr('data-id');
                $('#simpan-komentar').attr('data-id', id);
                ulasanModal.show();
            });

            $(document).on('click', '.rating', function(){
                var id = $(this).attr('data-id');
                $('#rating-komentar').val(id);

                switch(id){
                    case '1':
                            $('.rating-1').addClass('rating-s');
                            $('.rating-2').removeClass('rating-s');
                            $('.rating-3').removeClass('rating-s');
                            $('.rating-4').removeClass('rating-s');
                            $('.rating-5').removeClass('rating-s');
                        break;
                    case '2':
                            $('.rating-1').addClass('rating-s');
                            $('.rating-2').addClass('rating-s');
                            $('.rating-3').removeClass('rating-s');
                            $('.rating-4').removeClass('rating-s');
                            $('.rating-5').removeClass('rating-s');
                        break;
                    case '3':
                            $('.rating-1').addClass('rating-s');
                            $('.rating-2').addClass('rating-s');
                            $('.rating-3').addClass('rating-s');
                            $('.rating-4').removeClass('rating-s');
                            $('.rating-5').removeClass('rating-s');
                        break;
                    case '4':
                            $('.rating-1').addClass('rating-s');
                            $('.rating-2').addClass('rating-s');
                            $('.rating-3').addClass('rating-s');
                            $('.rating-4').addClass('rating-s');
                            $('.rating-5').removeClass('rating-s');
                        break;
                    case '5':
                            $('.rating-1').addClass('rating-s');
                            $('.rating-2').addClass('rating-s');
                            $('.rating-3').addClass('rating-s');
                            $('.rating-4').addClass('rating-s');
                            $('.rating-5').addClass('rating-s');
                        break;
                }
            });

            $(document).on('click', '#simpan-komentar', function(){
                var id = $(this).attr('data-id');
                var rating = $('#rating-komentar').val();
                var komentar = $('#text-komentar').val();

                $.ajax({
                    url: '{{ route("ulasan") }}',
                    type: 'post',
                    data: {
                        id:id,
                        rating:rating,
                        komentar:komentar,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(){
                        localStorage.removeItem('pesanan');
                        window.location.reload(); 
                    }
                });
            });
        </script>
    </body>
</html>