<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coords extends Model
{
    use HasFactory;

    protected $fillable = [
      'latitude',
      'longitude',
      'worker_id',
      'quartier',
      'prefecture'
    ];

    public function worker() {
        return $this->belongsTo(Worker::class, 'worker_id');
    }
}
