<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstagramToken extends Model
{
    protected $table = 'instagram_tokens';

    protected $fillable = [
        'access_token',
        'expires_in',
    ];
}
