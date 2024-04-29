<?php

namespace App\Exports;

use App\Models\MengajarModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class MengajarSheet implements FromQuery, WithHeadings, WithTitle
{
    protected $selectedMengajarIds;
    protected $sheetName;

    public function __construct($selectedMengajarIds, $sheetName)
    {
        $this->selectedMengajarIds = $selectedMengajarIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return MengajarModels::whereIn('id_Mengajar', $this->selectedMengajarIds)->select('jenis_pengajaran');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Jenis Pengajaran',
        ];
    }

    // Implementasikan method title untuk memberikan nama dinamis pada sheet
    public function title(): string
    {
        return $this->sheetName;
    }
}
