<?php

namespace App\Models;

use app\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    use HasFormatRupiah;

    protected $fillable = [
        'modal', 
        'pendapatan'];
}
