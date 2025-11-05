<?php

namespace Modules\ContactEtNewsletter\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    protected $fillable = [
        'question',
        'answer',
        'order',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    // Scope pour n'afficher que les éléments publiés
    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('order');
    }
}
