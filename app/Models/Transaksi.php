<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penjual() {
        return $this->belongsTo(User::class, 'penjual');
    }

    public function pembeli() {
        return $this->belongsTo(User::class, 'pembeli');
    }

    public function produk() {
        return $this->belongsTo(Produk::class);
    }

    public function bank() {
        return $this->belongsTo(Bank::class);
    }
}
