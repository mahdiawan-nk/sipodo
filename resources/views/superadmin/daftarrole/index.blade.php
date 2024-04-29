@extends('superadmin.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Role</h1>
        <a class="btn btn-primary btn-sm" href="/daftar-role/create">Create Role</a>
    </div>
    <!-- Content Row -->
    <div class="row">
         <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordred">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($role as $item)
                        <tr>
                            <td style="color: black;">
                               {{$item->role}}
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="" class="">Update</a>
                                <a class="btn btn-danger btn-sm" href="" class="">Delete</a>
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