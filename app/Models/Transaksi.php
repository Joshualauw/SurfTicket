<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [
        "id"
    ];

    public function htransaksi()
    {
        return $this->belongsTo(HTransaksi::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
