@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Edit Data Kompetensi</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-kompetensi-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-kompetensi-dosen/updateData/{{ $kompetensi->id_kompetensi}}" method="POST">
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
                                    Jenis Kompetensi
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Jenis Kompetensi"
                                        name="jenis_kompetensi" value="{{ $kompetensi->jenis_kompetensi }}">
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
