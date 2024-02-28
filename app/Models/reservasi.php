<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

     protected $table = 'reservasi';
    protected $fillable = [
        'no_kamar',
        'nama',
        'email',
        'no_telp',
        'nik',
        'tanggal_masuk',
        'tanggal_keluar',
    ]; 
}
