@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0" style="color: black">Pembicara</h1>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <a href="/form-pembicara-dosen" class="btn btn-sm btn-warning">Back</a>
                <form action="/form-pembicara-dosen/createData" method="POST">
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
                                        Judul Materi
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Isi Judul Materi"
                                            name="judul_materi">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Lokasi Kegiatan
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Isi Lokasi Kegiatan"
                                            name="lokasi_kegiatan">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Kegiatan
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" name="tanggal_kegiatan" max="{{date('Y-m-d')}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ruang Lingkup
                                    </td>
                                    <td>
                                        <select class="custom-select" name="ruang_lingkup">
                                            <option selected>Silahkan Pilih Ruang Lingkup</option>
                                            <option value="Lokal">Lokal</option>
                                            <option value="Nasional">Nasional</option>
                                            <option value="Internasional">Internasional</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Penyelenggara
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Isi Penyelenggara Kegiatan"
                                            name="penyelenggara">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>
@endsection
