<?php

namespace App\Exports;
use App\Models\BiodataModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Facades\DB;


class BiodataSheet implements FromQuery, WithHeadings, WithTitle
{
    protected $selectedBiodataIds;
    protected $sheetName;

    public function __construct($selectedBiodataIds, $sheetName)
    {
        $this->selectedBiodataIds = $selectedBiodataIds;
        $this->sheetName = $sheetName;
    }

    public function query()
{
    return BiodataModels::whereIn('id_biodata', $this->selectedBiodataIds)
        ->join('tb_user', 'tb_biodata.id', '=', 'tb_user.id')
        ->select(
            'tb_biodata.nama', 
            'tb_biodata.nidn', 
            'tb_user.nrp as nrp', 
            'tb_biodata.alamat', 
            'tb_biodata.tempat_lahir', 
            DB::raw("DATE_FORMAT(tb_biodata.tanggal_lahir, '%Y-%m-%d') as tanggal_lahir"), // Memperbaiki format tanggal_lahir
            'tb_biodata.nik', 
            'tb_biodata.agama', 
            'tb_biodata.email', 
            'tb_biodata.no_hp', 
            'tb_biodata.jenis_kelamin'
        );
}
    public function headings(): array
    {
        // Define column headers
        return [
            'Nama',
            'NIDN',
            'NRP',
            'Alamat',
            'Tempat Lahir',
            'Tanggal Lahir',
            'NIK',
            'Agama',
            'E-Mail',
            'No HP',
            'Jenis Kelamin',
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}