<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShortner extends Model
{
    use HasFactory;

    protected $table = 'url_shortners';
    protected $fillable = [
        'url_long',
        'short_url',
        'url_code',
        'click'
    ];
}
