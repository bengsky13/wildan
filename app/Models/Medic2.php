<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Medic2 extends Model
{
    use HasFactory;

      protected $fillable = [
      		'noremed',
            'kopasant',
            'tangantpas',
            'keluhan',
            'namdok',
            'periksa',
            'diagnosa',
            'noresep',
            'obat'
      ];
}
