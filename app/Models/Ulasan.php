<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function order(){
        return $this->belongsTo(Pesanan::class, 'order_id');
    }
}
