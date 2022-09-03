<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Medic1 extends Model
{
    use HasFactory;

      protected $fillable = [
      	'noremed',
            'kopasant',
            'namapasant',
            'tipasant',
            'tangantpas',
            'berat',
            'tinggi',
            'lingper',
            'suhu',
            'tekdar',
            'alergi',
            'kolest',
            'asur',
            'glukos',
            'hemog',
            'keluhan'
      ];
}
