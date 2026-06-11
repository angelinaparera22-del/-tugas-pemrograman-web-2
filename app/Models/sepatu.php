<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // tambahkan ini

class Sepatu extends Model
{
    use HasFactory, SoftDeletes; // aktifkan soft deletes

    protected $fillable = [
        'name',
        'brand',
        'size',
        'price',
        'stock',
        'deskripsi', // field baru ditambahkan di sini
    ];

    protected $guarded = ['id'];
}
