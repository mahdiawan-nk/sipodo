<?php

namespace App\Exports;
use App\Models\SeminardanPelatihanModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class SeminarDanPelatihanSheet implements FromQuery, WithHeadings, WithTitle
{
    protected $selectedSeminarDanPelatihanIds;
    protected $sheetName;

    public function __construct($selectedSeminarDanPelatihanIds, $sheetName)
    {
        $this->selectedSeminarDanPelatihanIds = $selectedSeminarDanPelatihanIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return SeminardanPelatihanModels::whereIn('id_seminardanpelatihan', $this->selectedSeminarDanPelatihanIds)->select('tema_seminardanpelatihan','tanggal_seminardanpelatihan','lokasi_seminardanpelatihan','penyelenggara');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Tema Seminar Atau Pelatihan',
            'Tanggal Seminar Atau Pelatihan',
            'Lokasi Seminar Atau Pelatihan',
            'Penyelenggara',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
