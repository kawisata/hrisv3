<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Offcycle;
use App\Models\Oncycle;
use App\Models\Position;
use Illuminate\Http\Request;
use PDF;

class SalarySlipController extends Controller
{

	public function all($uuid, $ttd)
	{

		$managersdm = Position::where('id', 92181677)->with('employee')->first();
		$oncycle = Oncycle::where('uuid', $uuid)
			->first();

		$offcycle = Offcycle::where('offcycle_id', $oncycle->oncycle_id)
		->first();
		if ($offcycle) {
			$penerimaan = $oncycle->t_penerimaan + $offcycle->t_penerimaan;
		} else {
			$penerimaan = $oncycle->t_penerimaan;
		}

		if ($offcycle) {
			$potongan_lain = $offcycle->potongan_lain - ($offcycle->potongan_lain * 2);
			$admin_bank = $offcycle->admin_bank - ($offcycle->admin_bank * 2);
			$potongan = $oncycle->t_potongan - $offcycle->t_potongan;
		} else {
			$potongan = $oncycle->t_potongan;
		}

		if ($offcycle) {
			$thp = $oncycle->thp + $offcycle->thp;
		} else {
			$thp = $oncycle->thp;
		}


		$pdf = PDF::loadView(
			'livewire.salary.user-salary-slip-all',
			compact(['oncycle', 'offcycle', 'ttd', 'penerimaan', 'potongan', 'thp', 'managersdm', 'potongan_lain', 'admin_bank'])
		);

		return $pdf->download($oncycle->month . '-' . $oncycle->year . '-' . $oncycle->jabatan . '-' . $uuid . '.pdf');
	}

	public function show($uuid)
	{
		$managersdm = Position::where('id', 92181677)->with('employee')->first();

		$oncycle = Oncycle::where('uuid', $uuid)
			->first();

		$pdf = PDF::loadView('livewire.salary.user-salary-slip-oncycle', compact(['oncycle', 'managersdm']));

		return $pdf->stream($uuid . '.pdf', array('Attachment' => 0));
	}

	public function show1($uuid)
	{
		$managersdm = Position::where('id', 92181677)->with('employee')->first();

		$offcycle = Offcycle::where('uuid', $uuid)
			->first();
		$potongan_lain = $offcycle->potongan_lain - ($offcycle->potongan_lain * 2);
		$admin_bank = $offcycle->admin_bank - ($offcycle->admin_bank * 2);
		$t_potongan = $offcycle->t_potongan - ($offcycle->t_potongan * 2);

		$pdf = PDF::loadView('livewire.salary.user-salary-slip-offcycle', compact(['offcycle', 'managersdm', 'potongan_lain', 'admin_bank', 't_potongan']));

		return $pdf->stream($uuid . '.pdf', array('Attachment' => 0));
	}
}
