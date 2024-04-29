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
                            <td>Buku</td>
                            <td>
                                <select class="custom-select" name="tahun_terbit" id="tahun_terbit">
                                    <option selected>Pilih Tahun</option>
                                    @foreach ($buku as $tahun)
                                        <option value="{{ $tahun->tahun }}" data-id="{{ $tahun->id_buku }}">{{ $tahun->tahun }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="" onclick="downloadAll()" class="btn btn-primary btn-sm">
                                    Selanjutnya
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
    function downloadAll() {
        var selectedTahun = document.getElementById('tahun_terbit');
        var selectedYear = selectedTahun.value;
        var selectedIdBuku = selectedTahun.options[selectedTahun.selectedIndex].getAttribute('data-id');
        
        if (selectedYear !== 'Pilih Tahun' && selectedIdBuku) {
            var downloadLink = "/download-all/" + selectedYear + "/" + selectedIdBuku;
            window.location.href = downloadLink;
        } else {
            alert('Please select a valid year.');
        }
    }
</script>
@endsection
