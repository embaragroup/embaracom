<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'agents';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'city', 'province', 'country'
    ];

    protected $hidden = ['password'];
}
