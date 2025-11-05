<?php
namespace  Modules\ContactEtNewsletter\Models\Newsletter ;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterDelivery;

class Subscriber extends Authenticatable
{
    use SoftDeletes  ;


    protected $keyType = 'string' ;
    public $incrementing = false ;

    protected $fillable = [
        'email',
        'phone',
        'token',
        'channels',
        'is_active',
        'subscribed_at',
        'unsubscribed_at',
    ];

    protected $casts = [
        'channels' => 'array',
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
    ];

    public function deliveries()
    {
        return $this->hasMany(NewsletterDelivery::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($subscriber) {
            $subscriber->token = Str::random(40);
            $subscriber->id = Str::uuid();
        });
    }
}
