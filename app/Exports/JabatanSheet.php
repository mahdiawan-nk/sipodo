<?php

namespace App\Exports;

use App\Models\JabatanModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Carbon\Carbon;

class JabatanSheet implements FromQuery, WithHeadings, WithTitle
{
    protected $selectedJabatanIds;
    protected $sheetName;

    public function __construct($selectedJabatanIds, $sheetName)
    {
        $this->selectedJabatanIds = $selectedJabatanIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return JabatanModels::whereIn('id_jabatan', $this->selectedJabatanIds)->select('posisi', 'tahun_mulai', 'tahun_selesai');
    }

    public function headings(): array
    {
        return [
            'Posisi',
            'Tahun Mulai',
            'Tahun Selesai',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }

    public function map($jabatan): array
{
    return [
        $jabatan->posisi,
        $jabatan->tahun_mulai,
        Carbon::parse($jabatan->tahun_selesai)->format('Y-m-d'),
    ];
}

    

}