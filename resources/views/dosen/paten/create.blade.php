@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Tambah Data Paten Dan Haki</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-patendanHaKi-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-patendanHaKi-dosen/createData" method="POST">
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
                                    Nama
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Nama Paten/HaKi"
                                        name="nama">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Terima
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tanggal Terima"
                                        name="tanggal_terima" max="{{ date('Y-m-d') }}">
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
