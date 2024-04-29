<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
       body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            padding: 20px;
            /* background-image: url({{asset('img/bg-cv.png')}}); */
        }

        h2 {
            color: #007bff;
        }

        .row {
            margin-top: 20px;
        }

        .col-4 {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        .col-8 {
            background-color: #ffffff;
            padding: 10px;
            border-radius: 5px;
        }

        p {
            margin-bottom: 5px;
        }

        p.font-bold {
            font-weight: bold;
        }
    </style>
    <title>CV Polkam</title>
</head>
<body style="background-image: url('data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/cv.jpeg'))) }}')">
    <div class="row">
        @if ($biodata->count() > 0)
            <div class="col-12">
                <table class="table">
                    <tbody>
                        @if ($biodata->count() > 0)
                            @foreach ($biodata as $item)   
                                <tr>
                                    <td style="text-align: right; padding-right: 30px">
                                        <p class="font-bold">{{$item->nama}}</p>
                                        <p>{{$item->alamat}}</p>
                                        <p>Phone/WA : {{$item->no_hp}}</p>
                                        <p>E-Mail : {{$item->email}}</p>
                                    </td>
                                    <td style="width: 100px; border-radius: 10px; overflow: hidden;"> <!-- Set a specific width and rounded corners for the image -->
                                        <img src="{{ public_path($item->photo_profile) }}" alt="Photo Profile" style="width: 100%; height: auto; display: block; border-radius: 10px;">
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    
    <div class="row">
        @if ($pendidikan->count() > 0 || $jabatan->count() > 0 ||$kompetensi->count() > 0|| $mengajar->count() > 0 || $seminardanpelatihan->count() > 0 || $penelitian->count() > 0 || $publikasi->count() > 0 || $pengabdian->count() > 0 || $hibah->count() > 0 || $buku->count() > 0 || $patendanHaKi->count() > 0|| $pembicara->count() > 0) 
            <div class="col-12">
                <table class="table">
                    <tbody>
                        @if ($pendidikan->count() > 0)
                            <tr>
                                <td style="font-weight: bold">Pendidikan</td>
                                <td>
                                    @foreach ($pendidikan as $item)
                                        <p style="font-weight: bold">{{$item->gelar}}</p>
                                        <p>{{$item->jurusan}}</p>
                                        <p>{{$item->perguruan_tinggi}}</p>
                                        <p>{{$item->asal_perguruan_tinggi}}</p>
                                        <p>{{$item->tanggal_kelulusan->format('d F Y')}}</p>
                                        <p></p>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
    
                        @if ($biodata->count() > 0)
                            <tr>
                                <td style="font-weight: bold">Jabatan Fungsional</td>
                                <td>
                                    @foreach ($biodata as $item)
                                        <p style="font-weight: bold">{{$item->jabfung}}</p>
                                        <p></p>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        
                        @if ($jabatan->count() > 0)
                            <tr>
                                <td style="font-weight: bold">Pengalaman Jabatan</td>
                                <td>
                                    @foreach ($jabatan as $item)
                                        <p style="font-weight: bold">{{$item->tahun_mulai->format('d F Y')}} - {{$item->tahun_selesai->format('d F Y')}}</p>
                                        <p>{{$item->posisi}}</p>
                                        <p></p>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
    
                        @if ($kompetensi->count() > 0)
                            <tr>
                                <td style="font-weight: bold">Kompetensi</td>
                                <td>
                                    @foreach ($kompetensi as $item)
                                        <p>{{$item->jenis_kompetensi}}</p>
                                        <p></p>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
    
                        @if ($mengajar->count() > 0)
                            <tr>
                                <td style="font-weight: bold">Pengalaman Mengajar</td>
                                <td>
                                    @foreach ($mengajar as $item)
                                        <p>{{$item->jenis_pengajaran}}</p>
                                        <!-- Add additional details here if needed -->
                                    @endforeach
                                </td>
                            </tr>
                        @endif

                        @if ($seminardanpelatihan->count() > 0)
                        <tr>
                            <td style="font-weight: bold">Seminar / Pelatihan</td>
                            <td>
                                @foreach ($seminardanpelatihan as $item)
                                    <p>{{$item->tema_seminardanpelatihan}}</p>
                                    <p>{{$item->tanggal_seminardanpelatihan->format('d F Y')}}</p>
                                    <p>{{$item->lokasi_seminardanpelatihan}}</p>

                                @endforeach
                            </td>
                        </tr>
                    @endif
    
                    @if ($penelitian->count() > 0)
                        <tr>
                            <td style="font-weight: bold">Pengalaman Penelitian</td>
                            <td>
                                @foreach ($penelitian as $item)
                                    <p>{{$item->judul_penelitian}}, {{$item->tahun_penelitian->format('d F Y')}}, {{$item->lokasi_penelitian}}, {{$item->sumber_dana}}, {{$item->nama_pemberi_dana}}</p>
                                    <p style="color: rgb(40, 40, 180); text-decoration: underline">{{$item->link_penelitian}}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endif
    
                    @if ($publikasi->count() > 0)
                        <tr>
                            <td style="font-weight: bold">Pengalaman Publikasi</td>
                            <td>
                                @foreach ($publikasi as $item)
                                    <p>{{$item->kategori_publikasi}},{{$item->nama_publikasi}},{{$item->tahun_publikasi->format('d F Y')}}</p>
                                    <p style="color: rgb(40, 40, 180); text-decoration: underline">{{$item->link_publikasi}}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endif
    
                    @if ($pengabdian->count() > 0)
                        <tr>
                            <td style="font-weight: bold">Pengalaman Pengabdian</td>
                            <td>
                                @foreach ($pengabdian as $item)
                                    <p>{{$item->judul_kegiatan}}, {{$item->tahun_kegiatan->format('d F Y')}}, {{$item->lokasi_kegiatan}}</p>
                                    <p style="color: rgb(40, 40, 180); text-decoration: underline">{{$item->link_pengabdian}}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endif

                    @if ($hibah->count() > 0)
                        <tr>
                            <td style="font-weight: bold">Pengalaman Hibah</td>
                            <td>
                                @foreach ($hibah as $item)
                                    <p>{{$item->nama_hibah}}, {{$item->tanggal_hibah->format('d F Y')}}, {{$item->lokasi_hibah}}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endif
    
                    @if ($buku->count() > 0)
                        <tr>
                            <td style="font-weight: bold">Buku</td>
                            <td>
                                @foreach ($buku as $item)
                                    <p>{{$item->judul}} (ISBN : {{$item->isbn}})</p>
                                    <a style="color: rgb(40, 40, 180); text-decoration: underline">{{$item->link}}</a>
                                @endforeach
                            </td>
                        </tr>
                    @endif
    
                    @if ($patendanHaKi->count() > 0)
                        <tr>
                            <td style="font-weight: bold">Paten / HaKi</td>
                            <td>
                                @foreach ($patendanHaKi as $item)
                                    <p>{{$item->nama}}, {{$item->tanggal_terima->format('d F Y')}}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                   
                    @if ($pembicara->count() > 0)
                        <tr>
                            <td style="font-weight: bold">Pembicara</td>
                            <td>
                                @foreach ($pembicara as $item)
                                    <p>{{$item->judul_materi}}, {{$item->tanggal_kegiatan->format('d F Y')}}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
