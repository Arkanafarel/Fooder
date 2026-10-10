<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Antrian extends Model
{
    protected $table = 'antrian';

    protected $fillable = [
        'pesanan_id',
        'nomor_antrian',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'nomor_antrian' => 'integer',
        ];
    }

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class);
    }
}