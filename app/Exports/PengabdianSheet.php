<?php

namespace App\Exports;
use App\Models\PengabdianModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PengabdianSheet implements  FromQuery, WithHeadings, WithTitle
{

    protected $selectedPengabdianIds;
    protected $sheetName;

    public function __construct($selectedPengabdianIds, $sheetName)
    {
        $this->selectedPengabdianIds = $selectedPengabdianIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return PengabdianModels::whereIn('id_pengabdian', $this->selectedPengabdianIds)->select('judul_kegiatan','tahun_kegiatan','lokasi_kegiatan','status','link_pengabdian');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Judul Kegiatan',
            'Tahun Kegiatan',
            'Lokasi Kegiatan',
            'Status',
            'Link Pengabdian',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
