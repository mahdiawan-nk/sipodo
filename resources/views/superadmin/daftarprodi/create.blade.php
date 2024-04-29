@extends('superadmin.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tambah Program Studi</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
         <div class="card-body">
            <div class="table-responsive">
                <form action="/daftar-prodi/createData" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Isi Prodi</label>
                        <input type="text" name="prodi" class="form-control"  placeholder="Isi Nama Prodi">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan Data
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection