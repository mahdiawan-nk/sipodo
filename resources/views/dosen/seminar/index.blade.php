@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Seminar/Pelatihan</h1>
            <a href="form-seminardanpelatihan-dosen/create" class="btn btn-primary btn-sm">Tambah Data
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
                                <th>Tema Seminar/Pelatihan</th>
                                <th>Tanggal Seminar/Pelatihan</th>
                                <th>Lokasi Seminar/Pelatihan</th>
                                <th>Penyelenggara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($seminardanpelatihan as $item)
                                <tr>
                                    <td>{{ $item->tema_seminardanpelatihan }}</td>
                                    <td>{{ $item->tanggal_seminardanpelatihan->format('d F Y') }}</td>
                                    <td>{{ $item->lokasi_seminardanpelatihan }}</td>
                                    <td>{{ $item->penyelenggara }}</td>
                                    <td>
                                        <a href="/form-seminardanpelatihan-dosen/update/{{ $item->id_seminardanpelatihan }}"
                                            class="btn btn-success btn-sm rounded-0">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/form-seminardanpelatihan-dosen/delete/{{ $item->id_seminardanpelatihan }}"
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
