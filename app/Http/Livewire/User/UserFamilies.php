<?php

namespace App\Http\Livewire\User;

use App\Models\Employee;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\UserFamily;
use Illuminate\Support\Facades\Validator;

class UserFamilies extends Component
{
    public $hubungan;
    public $name;
    public $nik;
    public $birthday_place;
    public $birthday;
    public $npwp;
    public $day;
    public $month;
    public $year;
    public $pasangan;
    public $anak;
    public $userfamilies;
    public $updateMode = false;
    public $selected_id;
    public $isOpen = 0;
    public $isOpen1 = 0;
    public $nik_user;

    public function confirmUserDeletion()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function mount()
    {
    }

    public function render()
    {
        // dd($this->nik1);
        $this->userfamilies = UserFamily::where('user_id',auth()->user()->id)->get();
        $this->pasangan = UserFamily::where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('hubungan', 'Suami')
                ->orWhere('hubungan', 'Istri')
                ->select('hubungan');
                })
            ->count();
        $this->anak = UserFamily::where('user_id', auth()->user()->id)
            ->where('hubungan', 'Anak')
            ->select('hubungan')
            ->count();

        return view('livewire.user.user-families');
    }

    public function submit()
    {
        $this->validate([
            'name'            =>  'required',
            'nik' => ['required','regex:/^(1[1-9]|21|[37][1-6]|5[1-3]|6[1-5]|[89][12])\d{2}\d{2}([04][1-9]|[1256][0-9]|[37][01])(0[1-9]|1[0-2])\d{2}\d{4}$/u', 'unique:user_families'],
            'hubungan'         =>  'required',
            'birthday_place'         =>  'required',
            'day'          =>  'required',
            'month'          =>  'required',
            'year'          =>  'required',
        ],
        [
            'name.required'               =>  'Nama wajib diisi',
            'nik.required'     =>  'NIK wajib diisi',
            'nik.unique'     =>  'NIK sudah terdaftar',
            'hubungan.required'      =>  'hubungan wajib diisi',
            'birthday_place.required'     =>  'Tempat Lahir wajib diisi',
            'day.required'      =>  'Tanggal wajib diisi',
            'month.required'      =>  'Bulan wajib diisi',
            'year.required'      =>  'Tahun wajib diisi',
        ]
        );

        UserFamily::create([
            'nip'               =>  auth()->user()->nip,
            'nik'               =>  $this->nik,
            'hubungan'          =>  $this->hubungan,
            'name'              =>  $this->name,
            'birthday_place'    =>  $this->birthday_place,
            'birthday'          =>  $this->year . '-' . $this->month . '-' . $this->day,
            'npwp'              =>  $this->npwp,
        ]);

        session()->flash('message1', 'data ' . $this->hubungan . ' berhasil disimpan');
        $this->reset();
        $this->isOpen1 = true;

    }

    public function edit($id)
    {

        $this->updateMode = true;

        $record = UserFamily::findOrFail($id);
        $this->selected_id = $id;
        $this->hubungan = $record->hubungan;
        $this->name  = $record->name;
        $this->nik  = $record->nik;
        $this->birthday_place  = $record->birthday_place;
        $this->npwp  = $record->npwp;
        $this->day  = Carbon::createFromFormat('Y-m-d', $record->birthday)->day;
        $this->month  = Carbon::createFromFormat('Y-m-d', $record->birthday)->month;
        $this->year  = Carbon::createFromFormat('Y-m-d', $record->birthday)->year;
        // dd($this->all());
    }

    public function update()
    {
        $this->validate([
            'name'            =>  'required',
            'nik'         =>  'required',
            'hubungan'         =>  'required',
            'birthday_place'         =>  'required',
            'day'          =>  'required',
            'month'          =>  'required',
            'year'          =>  'required',
        ],
        [
            'name.required'               =>  'Nama wajib diisi',
            'nik.required'     =>  'NIK wajib diisi',
            'hubungan.required'      =>  'hubungan wajib diisi',
            'birthday_place.required'     =>  'Tempat Lahir wajib diisi',
            'day.required'      =>  'Tanggal wajib diisi',
            'month.required'      =>  'Bulan wajib diisi',
            'year.required'      =>  'Tahun wajib diisi',
        ]
        );

       if ($this->selected_id) {
            $record = UserFamily::find($this->selected_id);
            $record->update([
                'nik'               =>  $this->nik,
                'hubungan'          =>  $this->hubungan,
                'name'              =>  $this->name,
                'birthday_place'    =>  $this->birthday_place,
                'birthday'          =>  $this->year . '-' . $this->month . '-' . $this->day,
                'npwp'              =>  $this->npwp,
            ]);

            session()->flash('message1', 'data ' . $this->hubungan . ' berhasil disimpan');
            $this->reset();
            $this->updateMode = false;

        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = UserFamily::find($id);
            $record->delete();
            session()->flash('deleted', 'data berhasil dihapus');
            $this->closeModal();
        }
    }

    public function addFamily()
    {
        return redirect()->route('user.families');
    }
    public function documentPph()
    {
        $employees = Employee::where('user_id',auth()->user()->id)->first();
        return redirect()->route('user.document-pph', ['nik' => $employees->nik,'nip' => auth()->user()->nip]);
    }

}
