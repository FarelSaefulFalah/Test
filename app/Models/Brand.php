<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $fillable = ['nama_brand'];
    public $visiable = ['nama_brand'];

    public function Produk(){
        return $this->hasMany(Produk::class);
    }
}
