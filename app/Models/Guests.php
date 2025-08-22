<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    // protected $table = 'guests';
    protected $fillable = [
        'id',
        'nama_tamu',
        'check_in',
        'check_out',
        'no_kamar',
        'email',
        'no_tlp',
        'status_tamu',
        'alamat_tamu',
        'kebutuhan_khusus',
    ];
}
