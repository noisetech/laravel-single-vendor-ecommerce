<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'gambar', 'nama', 'slug', 'kategori_id', 'deskripsi', 'berat', 'harga', 'ketersediaan', 'potongan_harga'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
