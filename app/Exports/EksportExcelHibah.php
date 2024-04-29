<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EksportExcelHibah implements WithMultipleSheets
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
            $ids = collect($sheetData['data'])->pluck('id_hibah',)->toArray();
            $sheetName = $sheetData['Hibah'];
            $sheets[] = (new DownloadAllSheetHibah($ids, $sheetName));
        }
        return $sheets;
    }
    
}
