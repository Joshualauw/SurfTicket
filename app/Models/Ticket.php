<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [
        "id"
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
}
