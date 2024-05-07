<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\Category;



class Barang extends Model
{
    use HasFactory;

    protected $table = ('item');

    protected $guarded = [];


    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_category');
    }
}
