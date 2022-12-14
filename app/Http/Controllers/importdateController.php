<?php

namespace App\Http\Controllers;
use App\Imports\FrontlinetImport;
use App\Models\UserFrontliner;
use Illuminate\Http\Request;
use App\Models\MemberReduksiFronliner;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
//use Maatwebsite\Excel\Concerns\WithBatchInserts;
//use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class importdateController implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithProgressBar, /*WithBatchInserts, WithChunkReading,*/ WithCalculatedFormulas
{
    use Importable;
    public function index()
	{
		$blogs = UserFrontliner::latest()->paginate(10);
        return view('MemberReduksi.FrmImportDate', compact('blogs'));
	}
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            MemberReduksiFronliner::updateOrCreate(
                [
                    'nip' => $row['nip'],
                ],
                [
                    'startdate' => $row['startdate'],
                    'enddate' => $row['enddate'],
                ],
            );
        }
    }
}