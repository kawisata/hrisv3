<?php

namespace App\Imports;

use App\Models\UserFrontliner;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FrontlinetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        UserFrontliner::whereId($row['nip'])->update([
            'startdate' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['startdate']),
            'enddate' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['enddate']),
        ]);
    }
}
