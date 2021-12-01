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

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
