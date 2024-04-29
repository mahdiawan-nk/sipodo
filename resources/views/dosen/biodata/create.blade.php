@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Tambah Biodata</h1>
            <form action="/biodata-dosen/createData" method="POST" enctype="multipart/form-data">
                @csrf
                <button class="btn btn-warning btn-sm" type="submit" value="submit">Simpan</button>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordred">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    Upload Photo Profile
                                </td>
                                <td>
                                    <input type="file" class="form-control" placeholder="Photo" id="photo"
                                        name="photo" accept="image/*">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nama
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Nama Anda" name="nama">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    NIDN
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi NIDN" name="nidn">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Alamat
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi alamat" name="alamat">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jenis Kelamin
                                </td>
                                <td>
                                    <select class="custom-select" name="jenis_kelamin">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tempat Lahir
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Tempat Lahir"
                                        name="tempat_lahir">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Lahir
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tanggal Lahir"
                                        name="tanggal_lahir" max="{{ date('Y-m-d') }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    NIK
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi NIK" name="nik">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Agama
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Agama" name="agama">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi email" name="email">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    No HP
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Nomor Handphone"
                                        name="no_hp">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </form>
@endsection
