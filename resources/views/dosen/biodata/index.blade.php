@extends('dosen.template.index')
@section('content')
    <div class="container-fluid" style="color: black">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0">Profile Dosen</h1>
            <div class="row">
                <a class="btn btn-warning btn-sm" href="/update-user/{{ $id }}/updateuser">Edit User</a>
                <a class="btn btn-warning btn-sm ml-2" href="/biodata-dosen/{{ $biodata->first()->id_biodata }}/update">Edit Biodata</a>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-sm" border="1">
                        <thead style="color: black;background-color: #cccccc">
                            <tr>
                                <th>Data</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
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
                        <tbody style="color: black">
                            @foreach ($biodata as $item)
                                <tr>
                                    <td>Foto</td>
                                    <td>
                                        @if ($item->photo_profile)
                                            <img src="{{ asset($item->photo_profile) }}" alt="Photo"
                                                style="max-width: 100px; border-radius: 10px">
                                        @else
                                            Foto tidak tersedia
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td> Nama</td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                                <tr>
                                    <td> Jabatan Fungsional</td>
                                    <td>{{ $item->jabfung }}</td>
                                </tr>
                                <tr>
                                    <td> NIDN </td>
                                    <td>{{ $item->nidn }}</td>
                                </tr>
                                <tr>
                                    <td> NRP </td>
                                    <td>{{ $item->nrp }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $item->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>{{ $item->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>{{ $item->tanggal_lahir->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>{{ $item->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>{{ $item->agama }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $item->email }}</td>
                                </tr>
                                <tr>
                                    <td>No Hp</td>
                                    <td>{{ $item->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
