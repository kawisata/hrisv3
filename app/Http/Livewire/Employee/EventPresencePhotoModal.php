<?php

namespace App\Http\Livewire\Employee;

use App\Models\Event;
use App\Models\EventPhoto;
use WireUi\Traits\Actions;
use App\Models\EventPresence;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use LivewireUI\Modal\ModalComponent;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;

class EventPresencePhotoModal extends ModalComponent
{
	use WithFileUploads, Actions;

	public $iteration;
	public $photo_files;
	public $event;

	public function mount(EventPresence $event)
	{
		$this->event = $event;
	}
	public function render()
	{
		$events = EventPresence::find($this->event->id);
		// $events = EventPhoto::where('event_presence_id', $this->event->id)->get();
		return view('livewire.employee.event-presence-photo-modal',compact('events'));
	}

	protected static array $maxWidths = [
		'sm' => 'sm:max-w-sm',
		'md' => 'sm:max-w-md',
		'lg' => 'sm:max-w-lg',
		'xl' => 'sm:max-w-xl',
		'2xl' => 'sm:max-w-2xl',
		'3xl' => 'sm:max-w-3xl',
		'4xl' => 'sm:max-w-4xl',
		'5xl' => 'sm:max-w-5xl',
		'6xl' => 'sm:max-w-6xl',
		'7xl' => 'sm:max-w-7xl',
		'full' => 'sm:max-w-full',
	];

	public static function modalMaxWidth(): string
	{
		return '6xl';
	}

	public function close()
	{
		$this->emit('updatedata');
		$this->closeModal();
		return redirect()->route('event.presences');
	}

	public function delete($id)
	{
		EventPhoto::find($id)->delete();
		$this->emit('updatedata');
	}
	}
