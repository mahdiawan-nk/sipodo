<?php

namespace App\Exports;
use App\Models\PenelitianModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;


class PenelitianSheet implements FromQuery, WithHeadings, WithTitle
{
    protected $selectedPenelitianIds;
    protected $sheetName;

    public function __construct($selectedPenelitianIds, $sheetName)
    {
        $this->selectedPenelitianIds = $selectedPenelitianIds;
        $this->sheetName = $sheetName;
    }

    public function query()
    {
        return PenelitianModels::whereIn('id_penelitian', $this->selectedPenelitianIds)->select('judul_penelitian','tahun_penelitian','lokasi_penelitian','status', 'link_penelitian','sumber_dana','nama_pemberi_dana');
    }

    public function headings(): array
    {
        // Define column headers
        return [
            'Judul Penelitian',
            'Tahun Penelitian',
            'Lokasi Penelitian',
            'Status',
            'Link Penelitian',
            'Sumber Dana',
            'Nama Pemberi Dana',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
