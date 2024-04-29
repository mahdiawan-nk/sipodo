<?php

namespace App\Exports;

use App\Models\KompetensiModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class KompetensiSheet implements FromQuery, WithHeadings, WithTitle
{
    protected $selectedKompetensiIds;
    protected $sheetName;

    public function __construct($selectedKompetensiIds, $sheetName)
    {
        $this->selectedKompetensiIds = $selectedKompetensiIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return KompetensiModels::whereIn('id_kompetensi', $this->selectedKompetensiIds)->select('jenis_kompetensi');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Jenis Kompetensi',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
