<?php

namespace Modules\ContactEtNewsletter\Models\Newsletter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class NewsletterDelivery extends Model
{
    use SoftDeletes;

    protected $keyType = 'string' ;
    public $incrementing = false ;

    protected $fillable = [
        'subscriber_id',
        'newsletter_message_id',
        'channel',
        'status',
        'is_read',
        'error_message',
        'delivered_at',
        'read_at',
    ];

    protected $casts = [
        'delivered_at' => 'datetime',
        'read_at' => 'datetime',
    ];

    public function subscriber(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Subscriber::class);
    }


    public function message(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(NewsletterMessage::class, 'newsletter_message_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($newsletterDelivery) {
            $newsletterDelivery->id = Str::uuid();
        });
    }
}
