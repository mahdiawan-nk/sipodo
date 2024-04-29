<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EksporExcelDownloadAll implements WithMultipleSheets
{
    protected $models;

    public function __construct($models)
    {
        $this->models = $models;
    }

    public function sheets(): array
    {
        $sheets = [];
    
        foreach ($this->models as $sheetData) {
            $ids = collect($sheetData['data'])->pluck('id_buku',)->toArray();
            $sheetName = $sheetData['Buku'];
            $sheets[] = (new DownloadAllSheet($ids, $sheetName));
        }
        return $sheets;
    }
    
}
