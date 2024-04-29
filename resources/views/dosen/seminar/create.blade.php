@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Seminar Dan Pelatihan</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-seminardanpelatihan-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-seminardanpelatihan-dosen/createData" method="POST">
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
                                    Tema Seminar/Pelatihan
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Tema Seminar/Pelatihan"
                                        name="tema_seminardanpelatihan">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Seminar/Pelatihan
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tanggal Seminar/Pelatihan"
                                        name="tanggal_seminardanpelatihan" max="{{ date('Y-m-d') }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Lokasi Seminar/Pelatihan
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Lokasi Seminar/Pelatihan"
                                        name="lokasi_seminardanpelatihan">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Penyelenggara
                                </td>
                                <td>
                                    <input type="text" class="form-control"
                                        placeholder="Isi Penyelenggara Seminar/Pelatihan" name="penyelenggara">
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
