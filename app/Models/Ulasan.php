<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';
    protected $primaryKey = 'id_ulasan';
    protected $guarded = [
        "id_ulasan"
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function order(){
        return $this->belongsTo(Pesanan::class, 'order_id');
    }
}
