<?php

namespace App\Exports;

use App\Models\PublikasiModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PublikasiSheet implements FromQuery, WithHeadings, WithTitle
{

    protected $selectedPublikasiIds;
    protected $sheetName;

    public function __construct($selectedPublikasiIds, $sheetName)
    {
        $this->selectedPublikasiIds = $selectedPublikasiIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return PublikasiModels::whereIn('id_publikasi', $this->selectedPublikasiIds)->select('kategori_publikasi','nama_publikasi','tahun_publikasi','autor','status_akreditasi','publiser','link_publikasi');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Ketogeri Publikasi',
            'Nama Publikasi',
            'Tahun Publikasi',
            'Autor',
            'Status Akreditasi',
            'Publisher',
            'Link Publikasi',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }

}
