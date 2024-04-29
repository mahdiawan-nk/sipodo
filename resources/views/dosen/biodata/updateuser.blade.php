@extends('dosen.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit Password Dan Username</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
         <div class="card-body">
            <form action="/update-user/{{$id}}/updateuserData" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Isi Nama Pengguna</label>
                    <input type="text" name="name" class="form-control" placeholder="Isi Nama Role" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label>Isi E-Mail Pengguna</label>
                    <input type="email" name="email" class="form-control" placeholder="Isi E-Mail Pengguna" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Isi Password Pengguna</label>
                    <input type="text" name="password" class="form-control" placeholder="Isi Password Pengguna" value="{{ $user->password }}">
                    <small>Password Wajib Diganti !!!</small>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
@endsection
