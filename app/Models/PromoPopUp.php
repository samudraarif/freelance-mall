<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoPopUp extends Model
{
    use HasFactory;
    protected $table = 'promo_pop_up';

    protected $fillable = [
        'title',
        'status',
        'image',
    ];
}
