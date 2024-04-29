@extends('direksi.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Dosen</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" method="GET" action="{{ route('search-dosen-direksi') }}">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Masukkan nama atau NRP"
                        aria-label="Search">
                    <select class="custom-select mr-sm-2" name="id_prodi">
                        <option selected disabled>Pilih Program Studi</option>
                        @foreach ($prodi as $item)
                            <option value="{{ $item->id_prodi }}">{{ $item->prodi }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </nav>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="card-body">
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
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td style="color: black;">
                                        {{ $item->nrp }}
                                    </td>
                                    <td style="color: black;">
                                        {{ $item->name }}
                                    </td>
                                    <td style="color: black;">
                                        {{ $item->prodi }}
                                    </td>
                                    <td>
                                        <a href="/download-excel-direksi/{{$item->id}}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-file-excel"></i> Excel
                                        </a>
                                        <a href="/download-cv-direksi/{{$item->id}}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-file-pdf"></i> PDF
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
