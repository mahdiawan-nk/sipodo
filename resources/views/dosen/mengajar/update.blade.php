@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Edit Data Mengajar</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-pengalaman-mengajar-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-pengalaman-mengajar-dosen/updateData/{{ $mengajar->id_mengajar }}" method="POST">
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
                                    Jenis Pengajaran
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Jenis Pengajaran"
                                        name="jenis_pengajaran" value="{{ $mengajar->jenis_pengajaran }}">
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
