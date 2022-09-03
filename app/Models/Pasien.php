<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'kopas',
        'namepas',
        'ttlpas',
        'jenkelpas',
        'usiapas',
        'alamatpas',
        'telppas',
        'kontdarpas',
        'tipas',
        'tangdappas',
        'tangkempas'
    ];
}
