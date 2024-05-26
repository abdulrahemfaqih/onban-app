<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $primaryKey = 'id_voucher';
    protected $fillable = [
        'kode_voucher',
        'nama_voucher',
        'potongan_harga',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_berakhir'
    ];

    public function order(){
        return $this->hasMany(Pesanan::class, 'voucher_id');
    }
}
