@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0" style="color: black">Penelitian</h1>
            <a href="/form-penelitian-dosen/create" class="btn btn-primary btn-sm">Tambah Data
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
                                <th>Judul Penelitian</th>
                                <th>Tahun Penelitian</th>
                                <th>Lokasi Penelitian</th>
                                <th>Status</th>
                                <th>Link Penelitian</th>
                                <th>Sumber Dana</th>
                                <th>Nama Pemberi Dana</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody style="color: black">
                            @foreach ($penelitian as $item)
                                <tr>
                                    <td>{{ $item->judul_penelitian }}</td>
                                    <td>{{ $item->tahun_penelitian->format('d F Y') }}</td>
                                    <td>{{ $item->lokasi_penelitian }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->link_penelitian }}</td>
                                    <td>{{ $item->sumber_dana }}</td>
                                    <td>{{ $item->nama_pemberi_dana }}</td>
                                    <td>
                                        <a href="/form-penelitian-dosen/update/{{ $item->id_penelitian }}"
                                            class="btn btn-success btn-sm rounded-0">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/form-penelitian-dosen/delete/{{ $item->id_penelitian }}"
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
@endsection
