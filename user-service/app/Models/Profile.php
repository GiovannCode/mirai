<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    'auth_user_id',
    'full_name',
    'email',
    'bio',
];
}