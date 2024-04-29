@extends('direksi.template.index')
@section('content')
<div class="container-fluid">
    
    <!-- Content Row -->
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <form action="/download-cv-direksi/downloadPDF" method="POST">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Dosen</h1>
                        </div>
                        <div class="ml-auto">
                        <button class="btn btn-sm btn-primary" type="submit" value="submit">Download</button>
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
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_pendidikan}}" name="selected_pendidikan_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->gelar}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->jurusan}} <br>
                            {{$item->perguruan_tinggi}} <br>
                            {{$item->asal_perguruan_tinggi}} <br>
                            {{$item->tanggal_kelulusan->format('d F Y')}}
                        </div>
                      </div>    
                       @endforeach
                   </div>
                   
                   <label for="">Pengalaman Jabatan</label>
                   <div class="container">
                       <div class="row">
                       </div>
                       @foreach ($jabatan as $item)
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_jabatan}}" name="selected_jabatan_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->posisi}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->tahun_mulai->format('d F Y')}} -
                            {{$item->tahun_selesai->format('d F Y')}}
                        </div>
                      </div> 
                       @endforeach
                   </div>
                   
                   <label for="">Kompetensi</label>
                   <div class="container">
                       <div class="row">
                       </div>
                       @foreach ($kompetensi as $item)
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_kompetensi}}" name="selected_kompetensi_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->jenis_kompetensi}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->jenis_kompetensi}} 
                        </div>
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
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_seminardanpelatihan}}" name="selected_seminardanpelatihan_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->tema_seminardanpelatihan}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->tanggal_seminardanpelatihan->format('d F Y')}} <br>
                            {{$item->lokasi_seminardanpelatihan}} <br>
                            {{$item->penyelenggara}}
                        </div>
                      </div> 
                       @endforeach
                   </div>
                  
                   <label for="">Pengalaman Penelitian</label>
                   <div class="container">
                       <div class="row">
                       </div>
                       @foreach ($penelitian as $item)
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_penelitian}}" name="selected_penelitian_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->judul_penelitian}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->tahun_penelitian->format('d F Y')}} <br>
                            {{$item->lokasi_penelitian}} <br>
                            {{$item->link_penelitian}} <br>
                            {{$item->sumber_dana}} <br>
                            {{$item->nama_pemberi_dana}}
                        </div>
                      </div> 
                       @endforeach
                   </div>
                  
                   <label for="">Pengalaman Publikasi</label>
                   <div class="container">
                       <div class="row">
                       </div>
                       @foreach ($publikasi as $item)
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_publikasi}}" name="selected_publikasi_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->nama_publikasi}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->kategori_publikasi}} <br>
                            {{$item->tahun_publikasi->format('d F Y')}} <br>
                            {{$item->status_akreditasi}} <br>
                            {{$item->publiser}} <br>
                            {{$item->link_publikasi}}
                        </div>
                      </div> 
                       @endforeach
                   </div>
                  
                   <label for="">Pengalaman Pengabdian</label>
                   <div class="container">
                       <div class="row">
                       </div>
                       @foreach ($pengabdian as $item)
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_pengabdian}}" name="selected_pengabdian_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->judul_kegiatan}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->tahun_kegiatan->format('d F Y')}} <br>
                            {{$item->lokasi_kegiatan}} <br>
                            {{$item->link_pegabdian}}
                        </div>
                      </div> 
                       @endforeach
                   </div>
                  
                   <label for="">Pengalaman Hibah</label>
                   <div class="container">
                       <div class="row">
                       </div>
                       @foreach ($hibah as $item)
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_hibah}}" name="selected_hibah_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->nama_hibah}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->tanggal_hibah->format('d F Y')}} <br>
                            {{$item->lokasi_hibah}} <br>
                            Rp. {{number_format ($item->jumlah_dana)}}
                        </div>
                      </div> 
                       @endforeach
                   </div>
                   
                   <label for="">Buku</label>
                   <div class="container">
                       <div class="row">
                       </div>
                       @foreach ($buku as $item)
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_buku}}" name="selected_buku_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->judul}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->tahun_terbit->format('d F Y')}} <br>
                            {{$item->isbn}} <br>
                            {{$item->kategori}} <br>
                            {{$item->link}} <br>
                            {{$item->lokasi_terbit}} <br>
                            {{$item->penerbit}} <br>
                            {{$item->autor}}
                        </div>
                      </div> 
                       @endforeach
                   </div>
                  
                  
                   <label for="">Paten / HaKi</label>
                   <div class="container">
                       <div class="row">
                       </div>
                       @foreach ($patendanhaki as $item)
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_patendanhaki}}" name="selected_patendanhaki_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->nama}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->tanggal_terima->format('d F Y')}}
                        </div>
                      </div> 
                       @endforeach
                   </div>

                   <label for="" class="font-weight-bold">Pembicara</label>
                   <div class="container">
                       <div class="row">
                       </div>
                       @foreach ($pembicara as $item)
                       <div class="card mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="{{$item->id_pembicara}}" name="selected_pembicara_ids[]">
                                </div>
                             </div>
                             <span class="form-control">{{$item->judul_materi}}</span>
                         </div>
                        <div class="card-body">
                            {{$item->tanggal_kegiatan->format('d F Y')}}
                        </div>
                      </div> 
                       @endforeach
                   </div>
                   
               </form>
           </div>
       </div>
   </div>

</div>
@endsection