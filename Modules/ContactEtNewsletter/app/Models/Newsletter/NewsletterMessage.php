<?php

namespace Modules\ContactEtNewsletter\Models\Newsletter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class NewsletterMessage extends Model
{
    use SoftDeletes;


    protected $keyType = 'string' ;
    public $incrementing = false ;

    protected $fillable = [
        'title',
        'content',
        'type',
        'sent_at'

    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function deliveries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(NewsletterDelivery::class, 'newsletter_message_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($newsletterMessage) {
            $newsletterMessage->id = Str::uuid();
        });
    }

}
