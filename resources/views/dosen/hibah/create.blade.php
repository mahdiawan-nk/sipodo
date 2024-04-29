@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Tambah Data Hibah</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-pengalaman-hibah-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-pengalaman-hibah-dosen/createData" method="POST">
                @csrf
                <button class="btn btn-primary btn-sm" type="submit" value="submit">Simpan</button>
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
                                    Judul Hibah
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Judul Hibah"
                                        name="nama_hibah">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Periode
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Periode"
                                        name="tanggal_hibah" max="{{ date('Y-m-d') }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Sumber Dana Hibah
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Sumber Dana Hibah"
                                        name="lokasi_hibah">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jumlah Dana Hibah
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Jumlah Dana Hibah"
                                        name="jumlah_dana">
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </form>

    </div>
@endsection
