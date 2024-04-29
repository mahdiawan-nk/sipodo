<?php

namespace App\Exports;

use App\Models\BukuModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class BukuSheet implements  FromQuery, WithHeadings, WithTitle
{
    protected $selectedBukuIds;
    protected $sheetName;

    public function __construct($selectedBukuIds, $sheetName)
    {
        $this->selectedBukuIds = $selectedBukuIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return BukuModels::whereIn('id_buku', $this->selectedBukuIds)->select('tahun_terbit','isbn','kategori','judul','link','lokasi_terbit','penerbit','autor');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Tahun Terbit',
            'ISBN',
            'Kategori',
            'Judul',
            'Judul',
            'Link Buku',
            'Lokasi Terbit',
            'Penerbit',
            'Author',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
