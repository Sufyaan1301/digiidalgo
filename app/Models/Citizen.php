<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $fillable = [
        'nik',
        'full_name',
        'kk',
        'address',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi'

    ];
}
