<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Transaksi;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [
        "id"
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
