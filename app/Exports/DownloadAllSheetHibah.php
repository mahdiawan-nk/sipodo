<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DownloadAllSheetHibah implements FromCollection, WithTitle, WithHeadings, WithMapping
{
    use Exportable;

    protected $ids;
    protected $sheetName;

    public function __construct($ids, $sheetName)
    {
        $this->ids = $ids;
        $this->sheetName = $sheetName;
    }

    public function title(): string
    {
        return $this->sheetName;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Nama Hibah',
            'Tanggal Hibah',
            'Lokasi Hibah',
            'Jumlah Dana',
        ];
    }

    public function map($row): array
    {
        return [
            $row->name,
            $row->nama_hibah,
            $row->tanggal_hibah,
            $row->lokasi_hibah,
            'Rp ' . number_format($row->jumlah_dana, 2, ',', '.'),
        ];
    }



    public function collection()
    {
        $data = DB::table('tb_hibah')
            ->select(
                'tb_user.name',
                'tb_hibah.nama_hibah',
                'tb_hibah.tanggal_hibah',
                'tb_hibah.lokasi_hibah',
                'tb_hibah.jumlah_dana'
            )
            ->join('tb_user', 'tb_hibah.id', '=', 'tb_user.id') 
            ->whereIn('tb_hibah.id_hibah', $this->ids)
            ->get();

        return $data;
    }
}
