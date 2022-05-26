<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barangs";
    public $timestamps = true;
    protected $fillable = ['nama_barang','stok','harga','created_at','updated_at'];
}
