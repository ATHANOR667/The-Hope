<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        'meta' , 'hero' ,'founders' ,
        'social_links'
    ];
    protected $casts = [
        'meta' => 'array',
        'hero' => 'array',
        'founders' => 'array',
        'social_links' => 'array',
    ];
}
