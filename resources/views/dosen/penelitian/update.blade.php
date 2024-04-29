@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Penelitian</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-penelitian-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-penelitian-dosen/{{ $penelitian->id_penelitian }}/updateData" method="POST">
                @method('put')
                @csrf
                <button class="btn btn-primary btn-sm" type="submit" value="submit">Simpan</button>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordred">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    Judul Penelitian
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Judul Penelitian"
                                        name="judul_penelitian" value="{{ $penelitian->judul_penelitian }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tahun Penelitian
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tahun Penelitian"
                                        name="tahun_penelitian" max="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime($penelitian->tahun_penelitian)) }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Lokasi Penelitian
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Lokasi Penelitian"
                                        name="lokasi_penelitian" value="{{ $penelitian->lokasi_penelitian }}">
                                </td>
                            </tr>
                            <tr>
                                <tr>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        <select class="custom-select" name="status">
                                            <option selected>Pilih Status</option>
                                            <option value="ketua"
                                                {{ $penelitian->status == 'ketua' ? 'selected' : '' }}>Ketua</option>
                                            <option value="anggota"
                                                {{ $penelitian->status == 'anggota' ? 'selected' : '' }}>Anggota</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            <tr>
                                <td>
                                    Link Penelitian
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Link Penelitian"
                                        name="link_penelitian" value="{{ $penelitian->link_penelitian }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Sumber Dana
                                </td>
                                <td>
                                    <select class="custom-select" name="sumber_dana">
                                        <option selected>Pilih Sumber Dana</option>
                                        <option value="internal"
                                            {{ $penelitian->sumber_dana == 'internal' ? 'selected' : '' }}>Internal</option>
                                        <option value="eksternal"
                                            {{ $penelitian->sumber_dana == 'eksternal' ? 'selected' : '' }}>Eksternal
                                        </option>
                                        <option value="mandiri"
                                            {{ $penelitian->sumber_dana == 'mandiri' ? 'selected' : '' }}>Mandiri</option>
                                    </select>
                                </td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nama Pemberi dana
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Nama Pemberi Dana"
                                        name="nama_pemberi_dana" value="{{ $penelitian->nama_pemberi_dana }}">
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </form>

    </div>
@endsection
