<?php

namespace Modules\ContactEtNewsletter\Models\Messaging;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Contact extends Authenticatable
{
    use  HasUuids;

    protected $fillable = [
        'name',
        'email',
        'phone_whatsapp',
        'phone_sms',
    ];

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
