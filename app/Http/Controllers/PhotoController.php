<?php

namespace App\Http\Controllers;

use App\Models\EventPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
	public function Show(EventPhoto $photo)
	{
		$foto = EventPhoto::find($photo->id);
			if (!Storage::disk('local')->exists($foto->photo_file)) {
				abort(404);
			}
			return response()->file(storage_path('app/' . $foto->photo_file));
	}
}
