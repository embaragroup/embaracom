<?php

namespace App\Models\AdminEmbara;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class AdminEmbara extends Authenticable
{
    use HasFactory;

    use Notifiable;

    protected $table = 'admin_embaras';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = ['password'];
}
