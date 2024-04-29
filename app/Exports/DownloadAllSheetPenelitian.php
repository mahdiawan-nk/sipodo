<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadAllSheetPenelitian implements FromCollection, WithTitle, WithHeadings
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
        // Ganti dengan kolom header yang sesuai
        return [
            'Nama', // Mengasumsikan 'tb_biodata.nama' seharusnya menjadi 'Nama'
            'Judul Penelitian',
            'Tahun Penelitian',
            'Lokasi Penelitian',
            'Status',
            'Link Penelitian',
            'Sumber Dana',
            'Nama Pemberi Dana',
        ];
    }

    public function collection()
    {
        // Ganti logika ini dengan logika pengambilan data yang sesungguhnya
        $data = DB::table('tb_penelitian')
            ->select(
                'tb_user.name',
                'tb_penelitian.judul_penelitian',
                'tb_penelitian.tahun_penelitian',
                'tb_penelitian.lokasi_penelitian',
                'tb_penelitian.status',
                'tb_penelitian.link_penelitian',
                'tb_penelitian.sumber_dana',
                'tb_penelitian.nama_pemberi_dana',
            )
            ->join('tb_user', 'tb_penelitian.id', '=', 'tb_user.id') 
            ->whereIn('tb_penelitian.id_penelitian', $this->ids)
            ->get();

        return $data;
    }
}
