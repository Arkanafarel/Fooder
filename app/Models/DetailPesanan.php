<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPesanan extends Model
{
    protected $table = 'detail_pesanan';

    protected $fillable = [
        'pesanan_id',
        'produk_id',
        'jumlah',
        'harga_satuan',
        'total_harga',
    ];

    protected function casts(): array
    {
        return [
            'jumlah' => 'integer',
            'harga_satuan' => 'float',
            'total_harga' => 'float',
        ];
    }

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }
}