<?php

namespace App\Exports;
use App\Models\PatenHakiModels;
use App\Models\PembicaraModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;


class PembicaraSheet implements  FromQuery, WithHeadings, WithTitle
{
    protected $selectedPembicaraIds;
    protected $sheetName;

    public function __construct($selectedPembicaraIds, $sheetName)
    {
        $this->selectedPembicaraIds = $selectedPembicaraIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return PembicaraModels::whereIn('id_pembicara', $this->selectedPembicaraIds)->select('judul_materi','tanggal_kegiatan');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Judul Materi',
            'Tanggal Kegiatans',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}