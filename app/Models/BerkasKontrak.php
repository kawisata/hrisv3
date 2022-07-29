<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasKontrak extends Model
{
    use HasFactory;
    protected $table = 'Berkas_Kontrak_Kerja';
    protected $fillable = [
        'user_id', 'no_urut_kontrak', 'no_kontrak', 'berkas_kontrak','tanggal_mulai', 'tanggal_selesai', 
        'upah_pokok', 'tunjangan_kesetaraan', 'tunjangan_profesional', 'tunjangan_tidak_tetap_pktw'
    ];
}
