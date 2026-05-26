<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id',
        'nama_sepatu',
        'rating',
        'komentar',
        'tanggal_ulasan',
        'status',
    ];

    protected $with = ['pelanggan'];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
