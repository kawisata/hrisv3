<?php

namespace App\Imports;

use App\Models\Wage;
use Ramsey\Uuid\Uuid;
use App\Models\Offcycle;
use App\Models\Oncycle;
use App\Models\SalaryCut;
use App\Models\TotalSalary;
use App\Models\WageComponent;
use App\Models\SocialSecurity;
use App\Models\UserPersonnelArea;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class OncycleImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithProgressBar, WithBatchInserts, WithChunkReading, WithCalculatedFormulas
{
        use Importable;

    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {

            Oncycle::updateOrCreate(
                    [
                        'oncycle_id' => $row['oncycle_id'],
                    ],
                    [
                        'uuid'          => (string)Uuid::uuid4(),
                        'nama' => $row['nama'],
                        'user_id' => $row['user_id'],
                        'jabatan' => $row['jabatan'],
                        'bank' => $row['bank'],
                        'rekening' => $row['rekening'],
                        'upah_pokok' => $row['upah_pokok'],
                        'pkwt' => $row['pkwt'],
                        'bpjs_base' => $row['bpjs_base'],
                        't_jabatan' => $row['t_jabatan'],
                        'perumahan' => $row['perumahan'],
                        't_admin_bank' => $row['t_admin_bank'],
                        't_kurang_bayar' => $row['t_kurang_bayar'],
                        'tht' => $row['tht'],
                        'jht_ajs' => $row['jht_ajs'],
                        'jht_ajs_p' => $row['jht_ajs_p'],
                        'jht' => $row['jht'],
                        'jht_p' => $row['jht_p'],
                        'jp' => $row['jp'],
                        'jp_p' => $row['jp_p'],
                        'jkk' => $row['jkk'],
                        'jk' => $row['jk'],
                        'jpk_kawis' => $row['jpk_kawis'],
                        'jpk_p_kawis' => $row['jpk_p_kawis'],
                        'jpk' => $row['jpk'],
                        'jpk_p' => $row['jpk_p'],
                        'jpk_uk' => $row['jpk_uk'],
                        'jpk_pens' => $row['jpk_pens'],
                        'jpk_pens_p' => $row['jpk_pens_p'],
                        'psc_kerja' => $row['psc_kerja'],
                        'pens_mandiri' => $row['pens_mandiri'],
                        'spka' => $row['spka'],
                        'potongan_lain' => $row['potongan_lain'],
                        'sewa_rumah_dinas' => $row['sewa_rumah_dinas'],
                        'sewa_mes' => $row['sewa_mes'],
                        'simp_baituridho' => $row['simp_baituridho'],
                        'cic_baituridho' => $row['cic_baituridho'],
                        'potongan_k_bayar' => $row['potongan_k_bayar'],
                        'pajak' => $row['pajak'],
                        'npwp' => $row['npwp'],
                        'admin_bank' => $row['admin_bank'],
                        'thp' => $row['thp'],
                        't_penerimaan' => $row['t_penerimaan'],
                        't_potongan' => $row['t_potongan'],
                        'month' => $row['month'],
                        'year' => $row['year'],
                        't_direksi' => $row['t_direksi'] ?? 0,
                        't_komisaris' => $row['t_komisaris'] ?? 0,
                        't_perumahan_direksi' => $row['t_perumahan_direksi'] ?? 0,
                        't_transport_komisaris' => $row['t_transport_komisaris'] ?? 0,
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
