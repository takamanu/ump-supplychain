<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Companies extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'qr_code_perusahaan',
        'company_name',
        'company_location',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function agen()
    // {
    //     return $this->belongsTo(Agen::class, 'agen');
    // }
}
