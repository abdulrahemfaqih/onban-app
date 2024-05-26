<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'worker';
    protected $primaryKey = 'id_worker';

    protected $fillable = [
        'login_id',
        'nama',
        'alamat',
        'no_hp',
        'foto_formal',
        'foto_ktp',
        'status_menerima_order',
        'status_verifikasi',
        'latitude',
        'longitude',
        'jenis_kelamin'
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }
    public function order() {
        return $this->hasMany(Pesanan::class);
    }
}
