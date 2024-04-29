<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EksportExcelPenelitian implements WithMultipleSheets
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
            $ids = collect($sheetData['data'])->pluck('id_penelitian',)->toArray();
            $sheetName = $sheetData['Penelitian'];
            $sheets[] = (new DownloadAllSheetPenelitian($ids, $sheetName));
        }
        return $sheets;
    }
    
}
