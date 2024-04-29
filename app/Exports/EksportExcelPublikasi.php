<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EksportExcelPublikasi implements WithMultipleSheets
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
            $ids = collect($sheetData['data'])->pluck('id_publikasi',)->toArray();
            $sheetName = $sheetData['Publikasi'];
            $sheets[] = (new DownloadAllSheetPublikasi($ids, $sheetName));
        }
        return $sheets;
    }
    
}
