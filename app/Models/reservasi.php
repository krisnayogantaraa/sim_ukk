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
    protected $fillable = [
        'id_reservasi',
        'id_akun',
        'tanggal_masuk',
        'tanggal_keluar',
        'tanggal_checkin',
        'tanggal_checkout',
        'no_kamar'
    ]; 
}
