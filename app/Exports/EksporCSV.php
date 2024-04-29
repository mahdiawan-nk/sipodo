<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EksporCSV implements WithMultipleSheets
{
    protected $selectedBiodataIds;
    protected $selectedPendidikanIds;
    protected $selectedJabatanIds;
    protected $selectedKompetensiIds;
    protected $selectedMengajarIds;
    protected $selectedSeminarDanPelatihanIds;
    protected $selectedPenelitianIds;
    protected $selectedPublikasiIds;
    protected $selectedPengabdianIds;
    protected $selectedHibahIds;
    protected $selectedBukuIds;
    protected $selectedPatenDanHakiIds;
    protected $selectedPembicaraIds;


    public function __construct($models)
    {
        $biodatacollection = collect($models['biodata']['data']);
        $pendidikanCollection = collect($models['pendidikan']['data']);
        $jabatancollection = collect($models['jabatan']['data']);
        $kompetensicollection = collect($models['kompetensi']['data']);
        $mengajarcollection = collect($models['mengajar']['data']);
        $seminarcollection = collect($models['seminar']['data']);
        $penelitiancollection = collect($models['penelitian']['data']);
        $publikasicollection = collect($models['publikasi']['data']);
        $pengabdiancollection = collect($models['pengabdian']['data']);
        $hibahcollection = collect($models['hibah']['data']);
        $bukucollection = collect($models['buku']['data']);
        $patendanhakicollection = collect($models['patendanhaki']['data']);
        $pembicaracollection = collect($models['pembicara']['data']);
       
        $this->selectedBiodataIds = $biodatacollection->pluck('id_biodata')->toArray();
        $this->selectedPendidikanIds = $pendidikanCollection->pluck('id_pendidikan')->toArray();
        $this->selectedJabatanIds = $jabatancollection->pluck('id_jabatan')->toArray();
        $this->selectedKompetensiIds = $kompetensicollection->pluck('id_kompetensi')->toArray();
        $this->selectedMengajarIds = $mengajarcollection->pluck('id_mengajar')->toArray();
        $this->selectedSeminarDanPelatihanIds = $seminarcollection->pluck('id_seminardanpelatihan')->toArray();
        $this->selectedPenelitianIds = $penelitiancollection->pluck('id_penelitian')->toArray();
        $this->selectedPublikasiIds = $publikasicollection->pluck('id_publikasi')->toArray();
        $this->selectedPengabdianIds = $pengabdiancollection->pluck('id_pengabdian')->toArray();
        $this->selectedHibahIds = $hibahcollection->pluck('id_hibah')->toArray();
        $this->selectedBukuIds = $bukucollection->pluck('id_buku')->toArray();
        $this->selectedPatenDanHakiIds = $patendanhakicollection->pluck('id_patendanhaki')->toArray();
        $this->selectedPembicaraIds = $pembicaracollection->pluck('id_pembicara')->toArray();
    }

    public function sheets(): array
    {
        $sheets = [];

        $biodataSheet = new BiodataSheet($this->selectedBiodataIds, 'Biodata');
        $sheets[]=$biodataSheet;

        $pendidikanSheet = new PendidikanSheet($this->selectedPendidikanIds, 'Pendidikan');
        $sheets[]=$pendidikanSheet;

        $jabatanSheet = new JabatanSheet($this->selectedJabatanIds,'Jabatan');
        $sheets[]=$jabatanSheet;

        $kompetensi = new KompetensiSheet($this->selectedKompetensiIds,'Kompetensi');
        $sheets[]=$kompetensi;

        $mengajar = new MengajarSheet($this->selectedMengajarIds,'Mengajar');
        $sheets[]=$mengajar;

        $seminar = new SeminarDanPelatihanSheet($this->selectedSeminarDanPelatihanIds,'Seminar Dan Pelatihan');
        $sheets[]=$seminar;

        $penelitian = new PenelitianSheet($this->selectedPenelitianIds,'Penelitian');
        $sheets[]=$penelitian;

        $publikasi = new PublikasiSheet($this->selectedPublikasiIds,'Publikasi');
        $sheets[]=$publikasi;

        $pengabdian = new PengabdianSheet($this->selectedPengabdianIds,'Pengabdian');
        $sheets[]=$pengabdian;

        $hibah = new HibahSheet($this->selectedHibahIds,'Hibah');
        $sheets[]=$hibah;

        $buku = new BukuSheet($this->selectedBukuIds,'Buku');
        $sheets[]=$buku;

        $patendanhaki = new PatenDanHakiSheet($this->selectedPatenDanHakiIds,'Paten Dan Haki');
        $sheets[]=$patendanhaki;

        $pembicara = new PembicaraSheet($this->selectedPembicaraIds,'Pembicara');
        $sheets[]=$pembicara;

        return $sheets;
    }
}