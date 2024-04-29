@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0" style="color: black">Form Edit Biodata</h1>

            <form action="/biodata-dosen/{{ $biodata->id_biodata }}/updateData" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <button class="btn btn-primary btn-sm" type="submit" value="submit">Simpan</button>
        </div>

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

                        <tbody style="color: black">
                            <tr>
                                <td>
                                    Photo Profile
                                </td>
                                <td>
                                    <input type="file" class="form-control" placeholder="Photo" id="photo"
                                        name="photo" accept="image/*">
                                    @if ($biodata->photo_profile)
                                        <img src="{{ asset($biodata->photo_profile) }}" alt="Photo"
                                            style="max-width: 100px; border-radius: 10px">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nama
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Nama Role" name="nama"
                                        value="{{ $biodata->nama }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jabatan Fungsional
                                </td>
                                <td>
                                    <select class="custom-select" name="jabfung">
                                        <option selected disabled>Pilih Jabatan Fungsional</option>
                                        <option value="Tenaga Pendidik"
                                            {{ $biodata->jabfung == 'Tenaga Pendidik' ? 'selected' : '' }}>Tenaga Pendidik</option>
                                        <option value="Asisten Ahli 100"
                                            {{ $biodata->jabfung == 'Asisten Ahli 100' ? 'selected' : '' }}>Asisten Ahli (100)</option>
                                        <option value="Asisten Ahli 150"
                                            {{ $biodata->jabfung == 'Asisten Ahli 150' ? 'selected' : '' }}>Asisten Ahli (150)</option>
                                        <option value="Lektor 200"
                                            {{ $biodata->jabfung == 'Lektor 200' ? 'selected' : '' }}>Lektor (200)</option>
                                        <option value="Lektor 300"
                                            {{ $biodata->jabfung == 'Lektor 300' ? 'selected' : '' }}>Lektor (300)</option>
                                        <option value="Lektor Kepala"
                                            {{ $biodata->jabfung == 'Lektor Kepala' ? 'selected' : '' }}>Lektor Kepala</option>
                                        <option value="Guru Besar"
                                            {{ $biodata->jabfung == 'Guru Besar' ? 'selected' : '' }}>Guru Besar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    NIDN
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi NIDN" name="nidn"
                                        value="{{ $biodata->nidn }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Alamat
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi alamat" name="alamat"
                                        value="{{ $biodata->alamat }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jenis Kelamin
                                </td>
                                <td>
                                    <select class="custom-select" name="jenis_kelamin">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki"
                                            {{ $biodata->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tempat Lahir
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Tempat Lahir"
                                        name="tempat_lahir" value="{{ $biodata->tempat_lahir }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Lahir
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tanggal Lahir"
                                    name="tanggal_lahir" value="{{ date('Y-m-d', strtotime($biodata->tanggal_lahir)) }}">
                             
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    NIK
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi NIK" name="nik"
                                        value="{{ $biodata->nik }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Agama
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Agama" name="agama"
                                        value="{{ $biodata->agama }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi email" name="email"
                                        value="{{ $biodata->email }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    No HP
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Nomor Handphone"
                                        name="no_hp" value="{{ $biodata->no_hp }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
