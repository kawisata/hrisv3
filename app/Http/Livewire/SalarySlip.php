<?php

namespace App\Http\Livewire;

use App\Models\Wage;
use App\Models\Oncycle;
use Livewire\Component;
use App\Models\Offcycle;

class SalarySlip extends Component
{
    public $month;
    public $year;
    public $slip1;
    public $slip2;
    public $ttd = 0;

    public function mount()
    {


    }
    public function render()
    {
        return view('livewire.salary.salary-slip');
    }

    public function update()
    {
        $this->validate(
            [
                'month' => 'required',
                'year'  => 'required'
            ]
        );

        $this->slip = Oncycle::where('user_id', auth()->user()->id)
            ->where('month', $this->month)
            ->where('year', $this->year)
            ->first();

        if(isset($this->slip->uuid)){
            return redirect()->route('user.salary-slip-all',['uuid'=>$this->slip->uuid,'ttd'=>$this->ttd]);
        }else{
        session()->flash('error1', 'Slip Gaji Upah Pokok dan Tunjangan Tetap anda belum ada');
            return redirect()->back();
        }
    }

    public function update1()
    {
        $this->validate(
            [
                'month' => 'required',
                'year'  => 'required'
            ]
        );

        $this->slip1 = Oncycle::where('user_id', auth()->user()->id)
            ->where('month', $this->month)
            ->where('year', $this->year)
            ->first();

        // dd($this->month, $this->year, $this->slip1);

        if(isset($this->slip1->uuid)){
        return redirect()->route('user.salary-slip-document',['uuid'=>$this->slip1->uuid]);
        }else{
        session()->flash('error1', 'Slip Gaji Upah Pokok dan Tunjangan Tetap anda belum ada');
            return redirect()->back();
        }
        // dd($this->slip->uuid);
        // return view('livewire.user.user-salary-slip-document');
    }

    public function update2()
    {
        $this->validate(
            [
                'month' => 'required',
                'year'  => 'required'
            ]
        );

        $this->slip2 = Offcycle::where('user_id', auth()->user()->id)
            ->where('month', $this->month)
            ->where('year', $this->year)
            ->first();

        if(isset($this->slip2->uuid)){
        return redirect()->route('user.salary-slip-offcycle',['uuid'=>$this->slip2->uuid]);
        }else{
        session()->flash('error2', 'Slip Gaji Tunjangan Tidak Tetap anda belum ada');
            return redirect()->back();
        }
        // dd($this->slip->uuid);
        // return view('livewire.user.user-salary-slip-document');
    }

}
