<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeLayanan extends Model
{
    use HasFactory;
    protected $table = 'tipe_layanan';
    protected $primaryKey = 'id_tipe_layanan';
    protected $fillable = [
        'nama_tipe_layanan',
        'deskripsi_tipe_layanan',
        'harga_tipe_layanan',
        'foto_tipe_layanan'
    ];

    public function order(){
        return $this->hasMany(Pesanan::class, 'tipe_layanan_id');
    }
}
