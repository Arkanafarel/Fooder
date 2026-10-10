<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'toko_id',
        'kategori_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'tipe',
        'stok',
        'in_stock',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'float',
            'stok' => 'integer',
            'in_stock' => 'boolean',
        ];
    }

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailPesanan(): HasMany
    {
        return $this->hasMany(DetailPesanan::class);
    }

    public function historiStok(): HasMany
    {
        return $this->hasMany(HistoriStok::class);
    }
}