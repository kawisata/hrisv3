<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\PersonalData;
use App\Models\UserFamily;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class EmployeesImport implements ToCollection, WithUpserts, WithStartRow, SkipsEmptyRows
{
    public function collection(Collection $rows)
    {

        // $value = $worksheet->getCell('A1')->getValue();
        // $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);

        foreach ($rows as $row) {

            Employee::updateOrCreate(
                [
                    'nip' => $row[1],
                ],
                [

                    'name'          => $row[3],
                    'kelamin'       => $row[4],
                    'place_of_birth'=> $row[5],
                    // 'birthday'      => Date::excelToDateTimeObject($row[6])->format('Y-m-d'),
                    'nik'           => $row[7],
                    // 'religion'      => $row[11],
                    'npwp'          => $row[9],
                ]
            );

        }
    }

    public function uniqueBy()
    {
        return 'nip';
    }

    public function startRow(): int
    {
        return 2;
    }
}
