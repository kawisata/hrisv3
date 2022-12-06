<?php

namespace App\Imports;

use Ramsey\Uuid\Uuid;
use App\Models\Offcycle;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class OffcycleImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithProgressBar, WithBatchInserts, WithChunkReading, WithCalculatedFormulas
{
        use Importable;

    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {

            Offcycle::updateOrCreate(
                    [
                        'offcycle_id' => $row['offcycle_id'],
                    ],
                    [
                        'uuid'          => (string)Uuid::uuid4(),
                        'nama' => $row['nama'],
                        'user_id' => $row['user_id'],
                        'bank' => $row['bank'],
                        'rekening' => $row['rekening'],
                        'transport' => $row['transport'],
                        'komunikasi' => $row['komunikasi'],
                        'jabatan' => $row['jabatan'],
                        'kinerja' => $row['kinerja'],
                        'khusus_jabatan' => $row['khusus_jabatan'],
                        'kemahalan' => $row['kemahalan'],
                        'cuti' => $row['cuti'],
                        'profesi' => $row['profesi'],
                        'pkwt' => $row['pkwt'],
                        't_penerimaan' => $row['t_penerimaan'],
                        't_potongan' => $row['t_potongan'],
                        'potongan_lain' => $row['potongan_lain'],
                        'admin_bank' => $row['admin_bank'],
                        'thp' => $row['thp'],
                        'month' => $row['month'],
                        'year' => $row['year'],
                        'position' => $row['position'],
                        'npwp' => $row['npwp'],
                    ]
                );
        }
    }

    // public function uniqueBy()
    // {
    //     return 'wage_id';
    // }

    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function batchSize(): int
    {
        return 500;
    }

}
