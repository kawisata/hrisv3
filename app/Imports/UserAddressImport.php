<?php

namespace App\Imports;

use App\Models\UserAddress;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;


class UserAddressImport implements ToCollection, WithUpserts, WithStartRow, SkipsEmptyRows
{
    public function collection(Collection $rows)
    {

        // $value = $worksheet->getCell('A1')->getValue();
        // $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);

        foreach ($rows as $row) {

            UserAddress::updateOrCreate(
                [
                    'nip' => $row[1],
                ],
                [
                    'address'       => $row[8],
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
