@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-1">
                <h1 class="h3 mb-0" style="color: black">Pembicara</h1>
                <a href="/form-pembicara-dosen/create" class="btn btn-primary btn-sm">Tambah Data
                </a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card-body" style="overflow: auto;">
                    <div class="table-responsive">
                        @if (session('success'))
                            <div id="success-alert" class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div id="error-alert" class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table table-sm" border="1">
                            <thead style="color: black;background-color: #cccccc">
                                <tr>
                                    <th>Judul Materi</th>
                                    <th>Lokasi Kegiatan</th>
                                    <th>Waktu Kegiatan</th>
                                    <th>Ruang Lingkup</th>
                                    <th>Penyelenggara</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembicara as $item)
                                    <tr>
                                        <td>{{ $item->judul_materi }}</td>
                                        <td>{{ $item->lokasi_kegiatan }}</td>
                                        <td>{{ $item->tanggal_kegiatan->format('d F Y') }}</td>
                                        <td>{{ $item->ruang_lingkup }}</td>
                                        <td>{{ $item->penyelenggara_kegiatan }}</td>
                                        <td>
                                            <a href="/form-pembicara-dosen/update/{{ $item->id_pembicara }}"
                                                class="btn btn-success btn-sm rounded-0">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="/form-pembicara-dosen/delete/{{ $item->id_pembicara }}"
                                                class="btn btn-danger btn-sm rounded-0">
                                                <i class="fa fa-trash" class="btn btn-danger btn-sm rounded-0"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
