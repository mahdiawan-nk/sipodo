@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Ubah Data Hibah</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-pengalaman-hibah-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-pengalaman-hibah-dosen/updateData/{{ $hibah->id_hibah }}" method="POST">
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
                                    Nama Hibah
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Nama Hibah"
                                        name="nama_hibah" value="{{ $hibah->nama_hibah }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Hibah
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tanggal Hibah"
                                        name="tanggal_hibah" max="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime($hibah->tanggal_hibah)) }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Lokasi Hibah
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Lokasi Hibah"
                                        name="lokasi_hibah" value="{{ $hibah->lokasi_hibah }}">
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
