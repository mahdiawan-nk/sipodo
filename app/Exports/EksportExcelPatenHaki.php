<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EksportExcelPatenHaki implements WithMultipleSheets
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
            $ids = collect($sheetData['data'])->pluck('id_patendanhaki',)->toArray();
            $sheetName = $sheetData['Paten Dan Haki'];
            $sheets[] = (new DownloadAllSheetPatenHaki($ids, $sheetName));
        }
        return $sheets;
    }
    
}
