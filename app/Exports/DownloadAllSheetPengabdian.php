<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadAllSheetPengabdian implements FromCollection, WithTitle, WithHeadings
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
            'Nama',
            'Judul Kegiatan',
            'Tahun Kegiatan',
            'Lokasi Kegiatan',
            'Status',
            'Link Pengabdian',
        ];
    }

    public function collection()
    {
        // Ganti logika ini dengan logika pengambilan data yang sesungguhnya
        $data = DB::table('tb_pengabdian')
            ->select(
                'tb_user.name',
                'tb_pengabdian.judul_kegiatan',
                'tb_pengabdian.tahun_kegiatan',
                'tb_pengabdian.lokasi_kegiatan',
                'tb_pengabdian.status',
                'tb_pengabdian.link_pengabdian',
            )
            ->join('tb_user', 'tb_pengabdian.id', '=', 'tb_user.id') 
            ->whereIn('tb_pengabdian.id_pengabdian', $this->ids)
            ->get();

        return $data;
    }
}
