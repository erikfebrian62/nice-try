<?php

namespace App\Models;

use App\Models\User;
use App\Models\Categorie;
use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use HasFormatRupiah;

    protected $fillable = [
        'tanggal',
        'user_id', 
        'kategori_id', 
        'modal', 
        'barang', 
        'jumlah', 
        'harga_jual', 
        'laba', 
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function kategori() {
        return $this->belongsTo(Categorie::class);
    }
    
}


