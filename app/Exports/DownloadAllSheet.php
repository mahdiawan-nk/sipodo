<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadAllSheet implements FromCollection, WithTitle, WithHeadings
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
            'Nama,', // Mengasumsikan 'tb_biodata.nama' seharusnya menjadi 'Nama'
            'Tahun Terbit',
            'ISBN',
            'Kategori',
            'Judul',
            'Link',
            'Lokasi Terbit',
            'Penerbit',
            'autor' // Mengasumsikan 'autor' seharusnya menjadi 'Pengarang'
            // ... tambahkan kolom lain sesuai kebutuhan
        ];
    }

    public function collection()
    {
        // Ganti logika ini dengan logika pengambilan data yang sesungguhnya
        $data = DB::table('tb_buku')
            ->select(
                'tb_user.name',
                'tb_buku.tahun_terbit',
                'tb_buku.isbn',
                'tb_buku.kategori',
                'tb_buku.judul',
                'tb_buku.link',
                'tb_buku.lokasi_terbit',
                'tb_buku.penerbit',
                'tb_buku.autor' // Mengasumsikan 'autor' seharusnya menjadi 'Pengarang'
                // 'tb_buku.kolom_lain', // Ganti ini dengan nama kolom yang sesuai
            )
            ->join('tb_user', 'tb_buku.id', '=', 'tb_user.id') 
            ->whereIn('tb_buku.id_buku', $this->ids)
            ->get();

        return $data;
    }
}
