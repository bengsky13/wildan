<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Apotek extends Model
{
    use HasFactory;

    protected $fillable = [
        'kobat',
        'namobat',
        'jenobat',
        'kemobat',
        'satobat',
        'stokobat'
    ];
}
