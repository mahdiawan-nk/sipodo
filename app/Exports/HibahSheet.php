<?php

namespace App\Exports;
use App\Models\HibahModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;


class HibahSheet implements  FromQuery, WithHeadings, WithTitle
{
    protected $selectedHibahIds;
    protected $sheetName;

    public function __construct($selectedHibahIds, $sheetName)
    {
        $this->selectedHibahIds = $selectedHibahIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return HibahModels::whereIn('id_hibah', $this->selectedHibahIds)->select('nama_hibah','tanggal_hibah','lokasi_hibah','jumlah_dana');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Nama Hibah',
            'Tanggal Hibah',
            'Lokasi Hibah',
            'Jumlah Dana',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
