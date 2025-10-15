<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Comment;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'username', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
