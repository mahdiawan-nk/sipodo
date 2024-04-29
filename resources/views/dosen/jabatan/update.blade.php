@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Form Ubah Pengalaman Jabatan</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-pengalaman-jabatan-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-pengalaman-jabatan-dosen/updateData/{{ $jabatan->id_jabatan }}" method="POST">
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
                                    Tahun Mulai
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tahun Mulai"
                                        name="tahun_mulai" max="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime($jabatan->tahun_mulai)) }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tahun Selesai
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tahun Selesai"
                                        name="tahun_selesai" max="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime($jabatan->tahun_selesai)) }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Posisi
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="posisi" name="posisi"
                                        value="{{ $jabatan->posisi }}">
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
