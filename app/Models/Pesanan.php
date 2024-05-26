<?php

namespace App\Models;

use App\Models\Ulasan;
use App\Models\Worker;
use App\Models\Voucher;
use App\Models\Customer;
use App\Models\TipeLayanan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'id_order';

    protected $guarded = [
        "id_order"
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function worker(){
        return $this->belongsTo(Worker::class, 'worker_id');
    }

    public function tipe_layanan(){
        return $this->belongsTo(TipeLayanan::class, 'tipe_layanan_id');
    }

    public function ulasan(){
        return $this->hasOne(Ulasan::class, 'order_id');
    }

    public function voucher(){
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function getIndonesianDayAttribute()
    {
        return Carbon::parse($this->tanggal)->locale('id')->translatedFormat('l');
    }
}
