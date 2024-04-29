@extends('dosen.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tambah Kompetensi</h1>
        <form action="/form-kompetensi-dosen/createData" method="POST">
            @csrf
            <button class="btn btn-warning btn-sm" type="submit" value="submit">Simpan</button>
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
                                    Jenis Kompetensi
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Isi Jenis Kompetensi" name="jenis_kompetensi">
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