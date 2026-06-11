<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Ulasan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_sepatu','rating','komentar','tanggal_ulasan','status','pelanggan_id'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
    public function scopeFilter(Builder $query, array $filters)
    {
        $query
            ->when($filters['keyword'] ?? false, function ($query, $keyword) {
                return $query->where('isi_ulasan', 'like', '%' . $keyword . '%')
                             ->orWhereHas('pelanggan', function ($q) use ($keyword) {
                                 $q->where('nama_pelanggan', 'like', '%' . $keyword . '%');
                             });
            })
            ->when($filters['pelanggan_id'] ?? false, function ($query, $pelangganId) {
                return $query->where('pelanggan_id', $pelangganId);
            });
    }
}
