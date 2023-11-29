<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restoran extends Model
{
    use HasFactory;
    protected $fillable = ['KodeBarang', 'NamaBarang', 'Satuan', 'HargaSatuan', 'Stok'];
    protected $table = 'barang';
    public $timestamps = false;
}
