<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadAllSheetPatenHaki implements FromCollection, WithTitle, WithHeadings
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
            'Nama Paten Dan Haki',
            'Tanggal Terima',
        ];
    }

    public function collection()
    {
        // Ganti logika ini dengan logika pengambilan data yang sesungguhnya
        $data = DB::table('tb_patendanhaki')
            ->select(
                'tb_user.name',
                'tb_patendanhaki.nama',
                'tb_patendanhaki.tanggal_terima',
            )
            ->join('tb_user', 'tb_patendanhaki.id', '=', 'tb_user.id') 
            ->whereIn('tb_patendanhaki.id_patendanhaki', $this->ids)
            ->get();

        return $data;
    }
}
