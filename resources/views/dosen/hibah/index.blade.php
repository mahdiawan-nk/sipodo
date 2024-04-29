@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengalaman Hibah</h1>
            <a href="/form-pengalaman-hibah-dosen/create" class="btn btn-primary btn-sm">Tambah Data
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
                                <th>Judul Hibah</th>
                                <th>Periode</th>
                                <th>Sumber Dana Hibah</th>
                                <th>Jumlah Dana Hibah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($hibah as $item)
                                <tr>
                                    <td>{{ $item->nama_hibah }}</td>
                                    <td>{{ $item->tanggal_hibah->format('d F Y') }}</td>
                                    <td>{{ $item->lokasi_hibah }}</td>
                                    <td>Rp. {{number_format($item->jumlah_dana) }}</td>
                                    <td>
                                        <a href="/form-pengalaman-hibah-dosen/update/{{ $item->id_hibah }}"
                                            class="btn btn-success btn-sm rounded-0">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/form-pengalaman-hibah-dosen/delete/{{ $item->id_hibah }}"
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
