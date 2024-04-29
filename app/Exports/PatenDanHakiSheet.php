<?php

namespace App\Exports;
use App\Models\PatenHakiModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;


class PatenDanHakiSheet implements  FromQuery, WithHeadings, WithTitle
{
    protected $selectedPatenDanHakiIds;
    protected $sheetName;

    public function __construct($selectedPatenDanHakiIds, $sheetName)
    {
        $this->selectedPatenDanHakiIds = $selectedPatenDanHakiIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return PatenHakiModels::whereIn('id_patendanhaki', $this->selectedPatenDanHakiIds)->select('nama','tanggal_terima');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Nama',
            'Tanggal Terima',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
