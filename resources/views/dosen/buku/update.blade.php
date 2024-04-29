@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: black">Tambah Data Buku</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="/form-buku-dosen" class="btn btn-sm btn-warning">Back</a>
            <form action="/form-buku-dosen/updateData/{{ $buku->id_buku }}" method="POST">
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
                                    Tahun Terbit
                                </td>
                                <td>
                                    <input type="date" class="form-control" placeholder="Isi Tahun Terbit"
                                        name="tahun_terbit" max="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime($buku->tahun_terbit)) }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ISBN
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi ISBN" name="isbn"
                                        value="{{ $buku->isbn }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Kategori
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Kategori" name="kategori"
                                        value="{{ $buku->kategori }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Judul Buku
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Judul Buku" name="judul"
                                        value="{{ $buku->judul }}">
                                </td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Link Buku
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Link Buku" name="link"
                                        value="{{ $buku->link }}">
                                </td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Lokasi Terbit
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Lokasi Terbit"
                                        name="lokasi_terbit" value="{{ $buku->lokasi_terbit }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Penerbit
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Penerbit" name="penerbit"
                                        value="{{ $buku->penerbit }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Autor
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Autor" name="autor"
                                        value="{{ $buku->autor }}">
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
