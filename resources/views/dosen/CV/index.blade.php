@extends('dosen.template.index')
@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
         <div class="card-body">
            <div class="table-responsive">
                <form action="/unduh-cv/download" method="POST">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                       <div class="ml-auto">
                           <button class="btn btn-warning btn-sm" type="submit" value="submit">Download</button>
                       </div>
                    </div>
                    @csrf
                    <label for="">Biodata</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($biodata as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_biodata}}" name="selected_biodata_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->nama}}</span>
                                </div>
                        @endforeach
                    </div>
                    
                    <label for="">Pendidikan</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($pendidikan as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_pendidikan}}" name="selected_pendidikan_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->gelar}}</span>
                                </div>
                        @endforeach
                    </div>
                    
                    <label for="">Pengalaman Jabatan</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($jabatan as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_jabatan}}" name="selected_jabatan_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->posisi}}</span>
                                </div>
                        @endforeach
                    </div>
                    
                    <label for="">Kompetensi</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($kompetensi as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_kompetensi}}" name="selected_kompetensi_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->jenis_kompetensi}}</span>
                                </div>
                        @endforeach
                    </div>
                   
                    <label for="">Pengalaman Mengajar</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($mengajar as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_mengajar}}" name="selected_mengajar_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->jenis_pengajaran}}</span>
                                </div>
                        @endforeach
                    </div>

                    <label for="">Seminar / Pelatihan</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($seminardanpelatihan as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_seminardanpelatihan}}" name="selected_seminardanpelatihan_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->tema_seminardanpelatihan}}</span>
                                </div>
                        @endforeach
                    </div>
                   
                    <label for="">Pengalaman Penelitian</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($penelitian as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_penelitian}}" name="selected_penelitian_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->judul_penelitian}}</span>
                                </div>
                        @endforeach
                    </div>
                   
                    <label for="">Pengalaman Publikasi</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($publikasi as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_publikasi}}" name="selected_publikasi_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->nama_publikasi}}</span>
                                </div>
                        @endforeach
                    </div>
                   
                    <label for="">Pengalaman Pengabdian</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($pengabdian as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_pengabdian}}" name="selected_pengabdian_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->judul_kegiatan}}</span>
                                </div>
                        @endforeach
                    </div>
                   
                    <label for="">Pengalaman Hibah</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($hibah as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_hibah}}" name="selected_hibah_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->nama_hibah}}</span>
                                </div>
                        @endforeach
                    </div>

                    <label for="">Buku</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($buku as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_buku}}" name="selected_buku_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->judul}}</span>
                                </div>
                        @endforeach
                    </div>

                    <label for="">Paten / HaKi</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($patendanhaki as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_patendanhaki}}" name="selected_patendanHaKi_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->nama}}</span>
                                </div>
                        @endforeach
                    </div>

                    <label for="">Pembicara</label>
                    <div class="container">
                        <div class="row">
                        </div>
                        @foreach ($pembicara as $item)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_pembicara}}" name="selected_pembicara_ids[]">
                                        </div>
                                    </div>
                                    <span class="form-control">{{$item->judul_materi}}</span>
                                </div>
                        @endforeach
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection