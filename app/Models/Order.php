<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    // Relasi ke karyawan (user)
    public function user()
    {
        return $this->belongsTo(User::class, 'karyawan_id');
    }

    // Relasi ke banyak harga (jenis pelayanan) melalui tabel pivot order_detail
    public function hargas()
    {
        return $this->belongsToMany(Harga::class, 'order_detail');
    }
}
