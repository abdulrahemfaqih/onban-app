<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';

    protected $fillable = [
        'login_id',
        'nama',
        'no_hp',
        'alamat',
        'jenis_kelamin'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
