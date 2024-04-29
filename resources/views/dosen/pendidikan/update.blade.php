@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Ubah Pendidikan</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-pendidikan-dosen/" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-pendidikan-dosen/updateData/{{ $pendidikan->id_pendidikan }}" method="POST">
                @method('put')
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
                                    Gelar
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Gelar" name="gelar"
                                        value="{{ $pendidikan->gelar }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jurusan
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Jurusan" name="jurusan"
                                        value="{{ $pendidikan->jurusan }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Perguruan Tinggi
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Nama Perguruan Tinggi"
                                        name="perguruan_tinggi" value="{{ $pendidikan->perguruan_tinggi }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Asal Perguruan Tinggi
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Asal Perguruan Tinggi"
                                        name="asal_perguruan_tinggi" value="{{ $pendidikan->asal_perguruan_tinggi }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Kelulusan
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tanggal Kelulusan"
                                        name="tanggal_kelulusan" max="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime($pendidikan->tanggal_kelulusan)) }}">
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
