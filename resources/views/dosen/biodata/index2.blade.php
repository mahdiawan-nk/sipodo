@extends('dosen.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biodata</h1>
            <a class="btn btn-warning btn-sm" href="/biodata-dosen/create">Tambah Data</a>
    </div>
    
    <!-- Content Row -->
    <div class="row">
         <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordred">
                    <thead>
                        <div class="mt-5">
                            <h3 style="color: black"><center>Selamat Datang Di Sistem Informasi <br> Rekam Jejak Tri Dharma Dosen Politeknik Kampar</center></h3>
                        </div>
                        <div class="mt-5">
                            <span style="color: black"><center>Silahkan Isi Data Diri Anda</center></span>
                        </div>
                    </thead>

                    <tbody>
                    
                    </tbody>      
                </table>
            </div>
        </div>
    </div>

</div>
@endsection