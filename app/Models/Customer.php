<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'login_id',
        'nama',
        'no_hp',
        'alamat',
        'foto_profil',
        'jenis_kelamin'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
