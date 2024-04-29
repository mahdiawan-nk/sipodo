@extends('dosen.template.index')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0" style="color: black">Publikasi</h1>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <a href="/form-publikasi-dosen" class="btn btn-sm btn-warning">Back</a>
                <form action="/form-publikasi-dosen/createData" method="POST">
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
                                        Kategori Publikasi
                                    </td>
                                    <td>
                                        <select class="custom-select" name="kategori_publikasi">
                                            <option selected>Pilih Kategori Publikasi</option>
                                            <option value="jurnal nasional terakreditasi">Jurnal Nasional Terakreditasi
                                            </option>
                                            <option value="jurnal nasional tidak terakreditasi">Jurnal Nasional Tidak
                                                Terakreditasi</option>
                                            <option value="jurnal internasional terakreditasi">Jurnal Internasional
                                                Terakreditasi</option>
                                            <option value="jurnal internasional tidak terakreditasi">Jurnal Internasional
                                                Tidak Terakreditasi</option>
                                            <option value="prosiding nasional">Prosiding Nasional</option>
                                            <option value="prosiding internasional">Prosiding Internasional</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nama Publikasi
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Isi Nama Publikasi"
                                            name="nama_publikasi">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tahun Publikasi
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" placeholder="Isi Tahun Publikasi"
                                            name="tahun_publikasi" max="{{ date('Y-m-d') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Autor
                                    </td>
                                    <td>
                                        <select class="custom-select" name="autor">
                                            <option selected>Pilih Status Autor</option>
                                            <option value="Single Autor">Single Autor</option>
                                            <option value="First Autor">First Autor</option>
                                            <option value="Member Autor">Member Autor</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                    Publiser
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Publiser"
                                        name="publiser">
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                        Status Akreditasi
                                    </td>
                                    <td>
                                        <select class="custom-select" name="status_akreditasi">
                                            <option selected>Pilih Status</option>
                                            <option value="Non Sinta">Non Sinta</option>
                                            <option value="Sinta 1">Sinta 1</option>
                                            <option value="Sinta 2">Sinta 2</option>
                                            <option value="Sinta 3">Sinta 3</option>
                                            <option value="Sinta 4">Sinta 4</option>
                                            <option value="Sinta 5">Sinta 5</option>
                                            <option value="Sinta 6">Sinta 6</option>
                                            <option value="Non Q">Non Q</option>
                                            <option value="Q1">Q1</option>
                                            <option value="Q2">Q2</option>
                                            <option value="Q3">Q3</option>
                                            <option value="Q4">Q4</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                    Link Publikasi
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Link Publikasi"
                                        name="link_publikasi">
                                </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>
@endsection
