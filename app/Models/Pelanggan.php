<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'nomor_telepon',
    ];

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class, 'pelanggan_id');
    }
}