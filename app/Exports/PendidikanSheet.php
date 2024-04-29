<?php

namespace App\Exports;

use App\Models\PendidikanModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PendidikanSheet implements FromQuery, WithHeadings, WithTitle
{
    protected $selectedPendidikanIds;
    protected $sheetName;

    public function __construct($selectedPendidikanIds, $sheetName)
    {
        $this->selectedPendidikanIds = $selectedPendidikanIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return PendidikanModels::whereIn('id_pendidikan', $this->selectedPendidikanIds)->select('gelar', 'jurusan','perguruan_tinggi','asal_perguruan_tinggi','tanggal_kelulusan');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Gelar',
            'Jurusan',
            'Perguruan Tinggi',
            'Asal Perguruan Tinggi',
            'Tanggal Kelulusan',
        ];
    }

    // Implementasikan method title untuk memberikan nama dinamis pada sheet
    public function title(): string
    {
        return $this->sheetName;
    }
}
