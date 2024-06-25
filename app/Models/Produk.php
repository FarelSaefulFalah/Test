<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
     public $fillable = ['nama_produk','stock','harga','deskripsi_produk','id_barang'];
    public $visiable = ['nama_produk','stock','harga','deskripsi_produk','id_barang'];

     public function Brand(){
        return $this->belongsTo(Produk::class);
    }
}
