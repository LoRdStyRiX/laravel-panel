<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\models;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    protected $guarded = [];

    
    public function item(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'item_id');
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
