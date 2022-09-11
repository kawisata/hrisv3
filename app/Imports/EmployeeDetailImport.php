<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\EmployeeDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class EmployeeDetailImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithProgressBar, WithBatchInserts, WithChunkReading, WithCalculatedFormulas
{
	use Importable;

	public function collection(Collection $rows)
	{
		foreach ($rows as $row) {

			Employee::updateOrCreate(
				[
					'user_id' => $row['user_id'],
				],
				[
					'nama' => $row['nama'],
					'gelar' => $row['gelar'],
					'tempat_lahir' => $row['tempat_lahir'],
					'tanggal_lahir' => $row['tanggal_lahir'],
					'tmt_kerja' => $row['tmt_kerja'],
				],
			);


			EmployeeDetail::updateOrCreate(
				[
					'nik' => $row['nik'],
				],
				[
					'user_id' => $row['user_id'],
					'kk' => $row['kk'],
					'npwp' => $row['npwp'],
					'address1' => $row['address1'],
					'address2' => $row['address2'],
					'bpjs' => $row['bpjs'],
					'agama' => $row['agama'],
					'kelamin' => $row['kelamin'],
					'nikah' => $row['nikah'],
					'tgl_nikah' => $row['tgl_nikah'],
					'emp_group' => $row['emp_group'],
					'emp_subgroup' => $row['emp_subgroup'],
					'pendidikan' => $row['pendidikan'],
					'jurusan' => $row['jurusan'],
					'tgl_lulus' => $row['tgl_lulus'],
					'sekolah' => $row['sekolah'],
				]
			);
		}
	}
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
