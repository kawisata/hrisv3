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

class EventPresenceModal extends ModalComponent
{
	use WithFileUploads, Actions;

	public $iteration;
	public $photo_files;
	public $event_id;



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
		return '3xl';
	}

	public function close()
	{
		$this->emit('updatedata');
		$this->closeModal();
		return redirect()->route('event.presences');
	}

	public function render()
	{
		$this->events = Event::all();
		return view('livewire.employee.event-presence-modal');
	}

	public function create()
	{

		$dataValid = $this->validate(
			[
				'event_id' => 'required',
				'photo_files.*' => 'required|image|mimes:mimes:jpg,jpeg,png,gif',
			],
			[
				'photo_files.*.image' => 'file harus berupa foto',
				'photo_files.*.mimes' => 'format file jpg, jpeg, png, gif',
			]
		);

		$event_presence = EventPresence::updateOrCreate(
			['event_id' => $this->event_id,
				'user_id' => auth()->user()->id
			],
			[
				'presence_at' => now()
			]
		);

			foreach ($this->photo_files as $image) {
				if ($image->isValid()) {

					$image_name = (string)Uuid::uuid4() . '.' . $image->getClientOriginalExtension();
					$path = storage_path('app/photo');
				$event_presence->event_photos()->create([
					'photo_file'            =>  'photo/' . $image_name,
				]);
					$imgx = Image::make($image->getRealPath());
				// dd($imgx);
					$imgx->resize(360, null, function ($constraint) {
						$constraint->aspectRatio();
					})->save($path . '/' . $image_name);
				}
			}

		return redirect()->route('event.presences');
		}
	}
