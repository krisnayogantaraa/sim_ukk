<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_ruangan extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

    protected $table = 'jenis_ruangan';

    protected $fillable = [
        'no_kamar',
        'nama',
        'jenis_suite',
        'kapasitas',
        'harga',
        'ketersediaan'
    ];
}
