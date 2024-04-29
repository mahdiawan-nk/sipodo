@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-1">
                <h1 class="h3 mb-0" style="color: black">Publikasi</h1>
                <a href="/form-publikasi-dosen/create" class="btn btn-primary btn-sm">Tambah Data
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
                                    <th>Kategori Publikasi</th>
                                    <th>Nama Publikasi</th>
                                    <th>Tahun Publikasi</th>
                                    <th>Autor</th>
                                    <th>Publiser</th>
                                    <th>Status Akreditasi</th>
                                    <th>Link Publikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($publikasi as $item)
                                    <tr>
                                        <td>{{ $item->kategori_publikasi }}</td>
                                        <td>{{ $item->nama_publikasi }}</td>
                                        <td>{{ $item->tahun_publikasi->format('d F Y') }}</td>
                                        <td>{{ $item->autor}}</td>
                                        <td>{{ $item->publiser}}</td>
                                        <td>{{ $item->status_akreditasi}}</td>
                                        <td>{{ $item->link_publikasi }}</td>
                                        <td>
                                            <a href="/form-publikasi-dosen/update/{{ $item->id_publikasi }}"
                                                class="btn btn-success btn-sm rounded-0">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="/form-publikasi-dosen/delete/{{ $item->id_publikasi }}"
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
