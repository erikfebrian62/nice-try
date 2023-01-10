<?php

namespace App\Models;

use app\Traits\HashFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    use HashFormatRupiah;

    protected $fillable = ['modal', 'pendapatan'];
}
