<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script language="javascript">

        function angka(evt) //Number
        {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          console.log(charCode);
            if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;

          return true;
        }

        function huruf(evt) //Alphabet + spc
        {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          console.log(charCode);
            if (charCode > 32 && (charCode < 97 || charCode > 122))
              return false;

          return true;
        }

    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Lukaririnki') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <a class="nav-link" href="{{route ('transaction')}}">Pesan Barang</a>
                        <a class="nav-link" href="{{route ('barang')}}">Barang</a>
                        <a class="nav-link" href="{{route ('kategori')}}" >Kategori</a>
                        <a class="nav-link" href="{{route ('pelanggan')}}">Pelanggan</a>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('jquery/jquery-3.4.1.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>


    <script >
        $(document).ready(function(){

            $("#listBrg").change(function() {
                var KdBrg = $(this).val();

                $.ajax({
                    url: "/transaction/barang",
                    type:"POST",
                    data: {"KdBrg":KdBrg,"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data){
                        // console.log(data);
                        $("#Satuan").val(data.Satuan);
                        $("#HargaBrg").val(data.HargaBrg);
                        $("#Stok").val(data.Stok);
                        $("#NmKategori").val(data.NmKategori );
                    },
                    error:function(x) {
                        console.log(x.responseText);
                    }
                });
                // console.log(kode);
            })

            $("#listPlg").change(function(){
                var KdPlg = $(this).val();
                    console.log(KdPlg);

                $.ajax({
                    url: "/transaction/pelanggan",
                    type: "POST",
                    data: {"KdPlg":KdPlg,"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data){
                        // console.log(data);

                        $("#AlamatPlg").html("");
                        $("#AlamatPlg").html(data.AlamatPlg);
                        $('#TelpPlg').val(data.TelpPlg);
                    },
                    error:function(x) {
                        console.log(x.responseText);
                    }
                })
            })

        })
    </script>


</body>
</html>
