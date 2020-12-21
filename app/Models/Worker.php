<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'note',
        'avatar',
        'user_id'
    ];

    public function user() {
        return $this->hasOne(User::class);
    }

    public function coords() {
        return $this->hasMany(Coords::class);
    }
}
