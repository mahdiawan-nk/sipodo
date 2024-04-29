@extends('superadmin.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Pengguna</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
         <div class="card-body">
            <form action="/daftar-pengguna/Data" method="POST">
                @csrf
                <div class="form-group">
                    <label>Isi Nama Pengguna</label>
                    <input type="text" name="name" class="form-control"  placeholder="Isi Nama Role">
                </div>
                <div class="form-group">
                    <label>Isi E-Mail Pengguna</label>
                    <input type="email" name="email" class="form-control"  placeholder="Isi E-Mail Pengguna">
                </div>
                <div class="form-group">
                    <label>Isi Password Pengguna</label>
                    <input type="text" name="password" class="form-control"  placeholder="Isi Password Pengguna">
                </div>
                <div class="form-group">
                    <label>Isi NRP Dosen</label>
                    <input type="text" name="nrp" class="form-control"  placeholder="Isi NRP Dosen">
                </div>
                <div class="mb-3">
                    <label class="form-label">Role Pengguna</label>
                    <select class="custom-select" name="id_role">
                        <option selected disabled>Pilih Role Pengguna</option>
                        @foreach ($role as $item)
                            <option value="{{ $item->id_role }}">{{ $item->role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <select class="custom-select" name="id_prodi">
                        <option selected disabled>Pilih Program Studi</option>
                        @foreach ($prodi as $item)
                            <option value="{{ $item->id_prodi }}">{{ $item->prodi }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" value="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>

</div>
@endsection