<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Companies;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function agen() {
        return $this->belongsTo(Agen::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function transaksi() {
        return $this->hasMany(Transaksi::class);
    }

    public function stock() {
        return $this->hasMany(Stock::class);
    }
}
