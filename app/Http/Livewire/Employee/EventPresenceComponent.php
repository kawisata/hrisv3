<?php

namespace App\Http\Livewire\Employee;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Models\Event;
use App\Models\EventPresence;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class EventPresenceComponent extends Component
{
	use WithPerPagePagination, WithPagination;
	public $search;

	protected $listeners = [
		'updatedata' => '$refresh',
	];

	public function loadNota()
	{
		sleep(rand(0, 1));
		$this->title = "Presensi Kegiatan";
	}
	public function searching($search)
	{
		$this->resetPage();
		$this->search = $search;
	}

	public function render()
	{
		$events = EventPresence::with('event')
			->leftJoin('events', 'event_presences.event_id', '=', 'events.id')
			->where('user_id', auth()->user()->id)
			->where('events.name', 'like', '%' . $this->search . '%')
			->paginate(7);
		return view('livewire.employee.event-presence-component',compact('events'));
	}


}
