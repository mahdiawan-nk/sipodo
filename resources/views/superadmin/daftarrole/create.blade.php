@extends('superadmin.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Create Role</h1>
        <a class="btn btn-primary btn-sm" href="/daftar-role/create">Create Role</a>
    </div>
    <!-- Content Row -->
    <div class="row">
         <div class="card-body">
            <div class="table-responsive">
                <form action="/daftar-role/createData" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Isi Role</label>
                        <input type="text" name="role" class="form-control"  placeholder="Isi Nama Role">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan Data
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection