@extends('superadmin.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Download Data Dosen</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="card-body" style="overflow: auto;">
            <div class="table-responsive">
                <table class="table table-sm" border="1">
                    <thead style="color: black;background-color: #cccccc">
                        <tr>
                            <th>Kategori</th>
                            <th><center>Pilih Tahun</center></th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td style="color: black;">Buku</td>
                            <td>
                                <select class="custom-select" name="tahun_terbit" id="tahun_terbit">
                                    <option selected>Pilih Tahun</option>
                                    @foreach ($buku as $tahun)
                                        <option value="{{ $tahun->tahun }}" data-id="{{ $tahun->id_buku }}">{{ $tahun->tahun }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="#" onclick="downloadBuku()" class="btn btn-primary btn-sm">
                                    Selanjutnya
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black;">Hibah</td>
                            <td>
                                <select class="custom-select" name="tanggal_hibah" id="tanggal_hibah">
                                    <option selected>Pilih Tahun</option>
                                    @foreach ($hibah as $tahun)
                                        <option value="{{ $tahun->tahun }}" data-id="{{ $tahun->id_hibah }}">{{ $tahun->tahun }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="#" onclick="downloadHibah()" class="btn btn-primary btn-sm">
                                    Selanjutnya
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black;">Paten/HaKi</td>
                            <td>
                                <select class="custom-select" name="tanggal_terima" id="tanggal_terima">
                                    <option selected>Pilih Tahun</option>
                                    @foreach ($patendanhaki as $tahun)
                                        <option value="{{ $tahun->tahun }}" data-id="{{ $tahun->id_patendanhaki }}">{{ $tahun->tahun }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="#" onclick="downloadPatenHaki()" class="btn btn-primary btn-sm">
                                    Selanjutnya
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black;">Penelitian</td>
                            <td>
                                <select class="custom-select" name="tahun_penelitian" id="tahun_penelitian">
                                    <option selected>Pilih Tahun</option>
                                    @foreach ($penelitian as $tahun)
                                        <option value="{{ $tahun->tahun }}" data-id="{{ $tahun->id_penelitian }}">{{ $tahun->tahun }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="#" onclick="downloadPenelitian()" class="btn btn-primary btn-sm">
                                    Selanjutnya
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black;">Pengabdian</td>
                            <td>
                                <select class="custom-select" name="tahun_kegiatan" id="tahun_kegiatan">
                                    <option selected>Pilih Tahun</option>
                                    @foreach ($pengabdian as $tahun)
                                        <option value="{{ $tahun->tahun }}" data-id="{{ $tahun->id_pengabdian }}">{{ $tahun->tahun }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="#" onclick="downloadPengabdian()" class="btn btn-primary btn-sm">
                                    Selanjutnya
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black;">Publikasi</td>
                            <td>
                                <select class="custom-select" name="tahun_publikasi" id="tahun_publikasi">
                                    <option selected>Pilih Tahun</option>
                                    @foreach ($publikasi as $tahun)
                                        <option value="{{ $tahun->tahun }}" data-id="{{ $tahun->id_publikasi }}">{{ $tahun->tahun }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="#" onclick="downloadPublikasi()" class="btn btn-primary btn-sm">
                                    Selanjutnya
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Buku --}}
    <div class="modal fade" id="downloadBuku" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="downloadModalLabel">Konfirmasi Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mendownload data untuk tahun <span id="modalTahunBuku"></span> dan ID Buku <span id="modalIdBuku"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="confirmDownloadBuku()">Download</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Hibah --}}
    <div class="modal fade" id="downloadHibah" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="downloadModalLabel">Konfirmasi Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mendownload data untuk tahun <span id="modalTahunHibah"></span> dan ID Hibah <span id="modalIdHibah"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="confirmDownloadHibah()">Download</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Paten Haki --}}
    <div class="modal fade" id="downloadPatenHaki" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="downloadModalLabel">Konfirmasi Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mendownload data untuk tahun <span id="modalTahunPatenHaki"></span> dan ID Paten Dan Haki <span id="modalIdPatenHaki"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="confirmDownloadPatenHaki()">Download</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Penelitian --}}
    <div class="modal fade" id="downloadPenelitian" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="downloadModalLabel">Konfirmasi Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mendownload data untuk tahun <span id="modalTahunPenelitian"></span> dan ID Penelitian <span id="modalIdPenelitian"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="confirmDownloadPenelitian()">Download</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Pengabdian --}}
    <div class="modal fade" id="downloadPengabdian" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="downloadModalLabel">Konfirmasi Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mendownload data untuk tahun <span id="modalTahunPengabdian"></span> dan ID Pengabdian <span id="modalIdPengabdian"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="confirmDownloadPengabdian()">Download</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Publikasi --}}
    <div class="modal fade" id="downloadPublikasi" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="downloadModalLabel">Konfirmasi Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mendownload data untuk tahun <span id="modalTahunPublikasi"></span> dan ID Publikasi <span id="modalIdPublikasi"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="confirmDownloadPublikasi()">Download</button>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Script Buku --}}
<script>
    var selectedYear;
    var selectedIdBuku;

    function downloadBuku() {
        var selectedTahun = document.getElementById('tahun_terbit');
        selectedYear = selectedTahun.value;
        selectedIdBuku = selectedTahun.options[selectedTahun.selectedIndex].getAttribute('data-id');
        
        if (selectedYear !== 'Pilih Tahun' && selectedIdBuku) {
            // Update modal content
            document.getElementById('modalTahunBuku').innerText = selectedYear;
            document.getElementById('modalIdBuku').innerText = selectedIdBuku;

            // Show the modal
            $('#downloadBuku').modal('show');
        } else {
            alert('Please select a valid year.');
        }
    }

    function confirmDownloadBuku() {
        // Hide the modal
        $('#downloadBuku').modal('hide');
        var downloadLink = "/download-all-buku/" + selectedYear + "/" + selectedIdBuku;
        window.location.href = downloadLink;
    }
</script>

{{-- Script Hibah --}}
<script>
    var selectedYear;
    var selectedIdHibah;

    function downloadHibah() {
        var selectedTahun = document.getElementById('tanggal_hibah');
        selectedYear = selectedTahun.value;
        selectedIdHibah = selectedTahun.options[selectedTahun.selectedIndex].getAttribute('data-id');
        
        if (selectedYear !== 'Pilih Tahun' && selectedIdHibah) {
            // Update modal content
            document.getElementById('modalTahunHibah').innerText = selectedYear;
            document.getElementById('modalIdHibah').innerText = selectedIdHibah;

            // Show the modal
            $('#downloadHibah').modal('show');
        } else {
            alert('Please select a valid year.');
        }
    }

    function confirmDownloadHibah() {
        // Hide the modal
        $('#downloadHibah').modal('hide');
        var downloadLink = "/download-all-hibah/" + selectedYear + "/" + selectedIdHibah;
        window.location.href = downloadLink;
    }
</script>

{{-- Script Paten Haki --}}
<script>
    var selectedYear;
    var selectedIdPatenHaki;

    function downloadPatenHaki() {
        var selectedTahun = document.getElementById('tanggal_terima');
        selectedYear = selectedTahun.value;
        selectedIdPatenHaki = selectedTahun.options[selectedTahun.selectedIndex].getAttribute('data-id');
        
        if (selectedYear !== 'Pilih Tahun' && selectedIdPatenHaki) {
            // Update modal content
            document.getElementById('modalTahunPatenHaki').innerText = selectedYear;
            document.getElementById('modalIdPatenHaki').innerText = selectedIdPatenHaki;

            // Show the modal
            $('#downloadPatenHaki').modal('show');
        } else {
            alert('Please select a valid year.');
        }
    }

    function confirmDownloadPatenHaki() {
        // Hide the modal
        $('#downloadPatenHaki').modal('hide');
        var downloadLink = "/download-all-paten-haki/" + selectedYear + "/" + selectedIdPatenHaki;
        window.location.href = downloadLink;
    }
</script>

{{-- Script Pengabdian --}}
<script>
    var selectedYear;
    var selectedIdPengabdian;

    function downloadPengabdian() {
        var selectedTahun = document.getElementById('tahun_kegiatan');
        selectedYear = selectedTahun.value;
        selectedIdPengabdian = selectedTahun.options[selectedTahun.selectedIndex].getAttribute('data-id');
        
        if (selectedYear !== 'Pilih Tahun' && selectedIdPengabdian) {
            // Update modal content
            document.getElementById('modalTahunPengabdian').innerText = selectedYear;
            document.getElementById('modalIdPengabdian').innerText = selectedIdPengabdian;

            // Show the modal
            $('#downloadPengabdian').modal('show');
        } else {
            alert('Please select a valid year.');
        }
    }

    function confirmDownloadPengabdian() {
        // Hide the modal
        $('#downloadPengabdian').modal('hide');
        var downloadLink = "/download-all-pengabdian/" + selectedYear + "/" + selectedIdPengabdian;
        window.location.href = downloadLink;
    }
</script>

{{-- Script Penelitian --}}
<script>
    var selectedYear;
    var selectedIdPenelitian;

    function downloadPenelitian() {
        var selectedTahun = document.getElementById('tahun_penelitian');
        selectedYear = selectedTahun.value;
        selectedIdPenelitian = selectedTahun.options[selectedTahun.selectedIndex].getAttribute('data-id');
        
        if (selectedYear !== 'Pilih Tahun' && selectedIdPenelitian) {
            // Update modal content
            document.getElementById('modalTahunPenelitian').innerText = selectedYear;
            document.getElementById('modalIdPenelitian').innerText = selectedIdPenelitian;

            // Show the modal
            $('#downloadPenelitian').modal('show');
        } else {
            alert('Please select a valid year.');
        }
    }

    function confirmDownloadPenelitian() {
        // Hide the modal
        $('#downloadPenlitian').modal('hide');
            var downloadLink = "/download-all-penelitian/" + selectedYear + "/" + selectedIdPenelitian;
        window.location.href = downloadLink;
    }
</script>

{{-- Script Publikasi --}}
<script>
    var selectedYear;
    var selectedIdPublikasi;

    function downloadPublikasi() {
        var selectedTahun = document.getElementById('tahun_publikasi');
        selectedYear = selectedTahun.value;
        selectedIdPublikasi = selectedTahun.options[selectedTahun.selectedIndex].getAttribute('data-id');
        
        if (selectedYear !== 'Pilih Tahun' && selectedIdPublikasi) {
            // Update modal content
            document.getElementById('modalTahunPublikasi').innerText = selectedYear;
            document.getElementById('modalIdPublikasi').innerText = selectedIdPublikasi;

            // Show the modal
            $('#downloadPublikasi').modal('show');
        } else {
            alert('Please select a valid year.');
        }
    }

    function confirmDownloadPublikasi() {
        // Hide the modal
        $('#downloadPublikasi').modal('hide');
        var downloadLink = "/download-all-publikasi/" + selectedYear + "/" + selectedIdPublikasi;
        window.location.href = downloadLink;
    }
</script>

@endsection
