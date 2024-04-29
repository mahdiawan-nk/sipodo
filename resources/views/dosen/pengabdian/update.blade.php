@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Pengabdian</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-pengabdian-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-pengabdian-dosen/{{ $pengabdian->id_pengabdian }}/updateData" method="POST">
                @method('put')
                @csrf
                <button class="btn btn-primary btn-sm" type="submit" value="submit">Simpan</button>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-sm">
                        <thead style="background-color: #cccccc;color: black">
                            <tr>
                                <th>Data</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody style="color: black">
                            <tr>
                                <td>
                                    Judul Kegiatan
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Judul Kegiatan Pengabdian"
                                        name="judul_kegiatan" value="{{ $pengabdian->judul_kegiatan }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tahun Kegiatan
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="tahun_kegiatan"
                                        max="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime($pengabdian->tahun_kegiatan)) }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Lokasi Kegiatan
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Lokasi Kegiatan Pengabdian"
                                        name="lokasi_kegiatan" value="{{ $pengabdian->lokasi_kegiatan }}">
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
                                                {{ $pengabdian->status == 'ketua' ? 'selected' : '' }}>Ketua</option>
                                            <option value="anggota"
                                                {{ $pengabdian->status == 'anggota' ? 'selected' : '' }}>Anggota</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            <tr>
                                <td>
                                    Link Pengabdian
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Link Pengabdian"
                                        name="link_pengabdian" value="{{ $pengabdian->link_pengabdian }}">
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
