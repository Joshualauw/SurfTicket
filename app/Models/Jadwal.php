<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
