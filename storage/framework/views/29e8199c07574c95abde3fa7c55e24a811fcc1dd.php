<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

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
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Lukaririnki')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                        
                        <a class="nav-link" href="<?php echo e(route ('transaction')); ?>">Pesan Barang</a>
                        <a class="nav-link" href="<?php echo e(route ('barang')); ?>">Barang</a>
                        <a class="nav-link" href="<?php echo e(route ('kategori')); ?>" >Kategori</a>
                        <a class="nav-link" href="<?php echo e(route ('pelanggan')); ?>">Pelanggan</a>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>


                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script type="text/javascript" src="<?php echo e(asset('jquery/jquery-3.4.1.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    


    <script >
        $(document).ready(function(){

            $("#listBrg").change(function() {
                var KdBrg = $(this).val();

                $.ajax({
                    url: "/transaction/barang",
                    type:"POST",
                    data: {"KdBrg":KdBrg,"_token":"<?php echo e(csrf_token()); ?>"},
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
                    data: {"KdPlg":KdPlg,"_token":"<?php echo e(csrf_token()); ?>"},
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
<?php /**PATH C:\laragon\www\barang_0369\resources\views/layouts/app.blade.php ENDPATH**/ ?>