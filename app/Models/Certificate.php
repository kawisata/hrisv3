<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use LSNepomuceno\LaravelA1PdfSign\ManageCert;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    public $hash, $certificate, $password;

    protected $fillable = [
        'certificate',
        'hash',
        'password',
        'user_id',
        ];
    use HasFactory;

    public function parse(): ?ManageCert {
        try {
            // IMPORTANT
            // Set true if you only use the "encryptBase64BlobString" method
	    return decryptCertData($this->hash, $this->certificate, $this->password, false);
        } catch (\Throwable $th) {
            // TODO necessary
        }
    }
}
