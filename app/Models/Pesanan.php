<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'toko_id',
        'kode_pesanan',
        'tipe_pesanan',
        'status',
        'total_harga',
    ];

    protected function casts(): array
    {
        return [
            'total_harga' => 'float',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }

    public function detailPesanan(): HasMany
    {
        return $this->hasMany(DetailPesanan::class);
    }

    public function antrian(): HasOne
    {
        return $this->hasOne(Antrian::class);
    }

    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class);
    }
}