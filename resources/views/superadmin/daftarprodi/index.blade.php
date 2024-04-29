@extends('superadmin.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Prodi</h1>
        <a class="btn btn-primary btn-sm" href="/daftar-prodi/create">Create Prodi</a>
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
                            <th>Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($prodi as $item)
                        <tr>
                            <td style="color: black;">
                                 {{$item->prodi}}
                            </td>
                            <td>
                                <a href="/daftar-prodi/update/{{$item->id_prodi}}" class="btn btn-success btn-sm rounded-0">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="/daftar-prodi/{{$item->id_prodi}}/delete" class="btn btn-danger btn-sm rounded-0">
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