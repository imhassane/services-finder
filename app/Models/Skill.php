<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover',
        'visible'
    ];

    public function users() {
        return $this->hasMany(UserSkill::class, 'skill_id');
    }

    public function hasUser(User $user) {
        return $this->users->contains('user_id', $user->id);
    }
}
