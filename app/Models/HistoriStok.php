<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoriStok extends Model
{
    protected $table = 'histori_stok';

    protected $fillable = [
        'produk_id',
        'user_id',
        'tipe',
        'jumlah_sebelum',
        'jumlah_perubahan',
        'jumlah_setelah',
        'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'jumlah_sebelum' => 'integer',
            'jumlah_perubahan' => 'integer',
            'jumlah_setelah' => 'integer',
        ];
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}