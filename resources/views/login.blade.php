<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('/img/polkam.png')}}" type="image/x-icon">
    <title>Politeknik Kampar - Login</title>

       <!-- Custom fonts for this template-->
       <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
       <link
           href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
           rel="stylesheet">
   
       <!-- Custom styles for this template-->
       <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
   

</head>

<body>
<nav class="navbar" style="background-color: #ff9933;color: white">
    <div class="container justify-content-between">
        <img src="{{asset('/img/logop3m.png')}}" alt="" height="50" width="50">
  <h5 class="font-weight-bold" style="font-family: Arial, Helvetica, sans-serif">Sistem Informasi Rekam Jejak</h5>
        <img src="{{asset('/img/polkam.png')}}" alt="" height="50" width="50">
    </div>
</nav>

    <div class="container">
        <div class="col">
            <div class="col-sm-12">
                <div class="row">
                        <div class="col-sm-6">
                            <div class="mt-5">
                                <h1 style="color: black">Selamat Datang Di Sistem Rekam Jejak Tri Dharma Dosen Politeknik Kampar</h1>
                            </div>
                            <div class="mt-5">
                                <span style="color: black">Silahkan Masuk Ke Akun Anda, Jika Belum Memiliki Akun Silahkan Hubungi Pihak P3M</span>
                            </div>
                            <a href="https://drive.google.com/drive/folders/1dZGGZZPiW5gIYtlXKBALdaUWYxomSQCP?usp=sharing" class="btn btn-sm btn-primary">Buku Panduan</a>
                        </div>
                        <div class="col-sm-6">
                            <div class="row justify-content-center ">
                                    <div class="card o-hidden border-0 shadow-lg my-5">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="p-5">
                                                        <div class="text-center">
                                                        </div>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $item)
                                                                                <li class="d-flex justify-content-start">{{ $item }}
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            <div class="form-group">
                                                                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username" value="{{old('email')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Password">
                                                            </div>
                                                                <center>    
                                                                    <br>
                                                                    <button class="btn btn-primary  btn-sm" type="submit" value="submit">Login</button>
                                                                </center>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    

    <nav class="navbar fixed-bottom" style="background-color: #ff9933;color: white">
        <div class="container justify-content-center">
            <span>2023 | All Right Reserved By SAIY</span>
          </div>
    </nav>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>