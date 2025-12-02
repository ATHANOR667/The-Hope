<?php

namespace Modules\ContactEtNewsletter\Models\Messaging;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasUuids ;

    const CHANNEL_OPTIONS = [
        self::CHANNEL_EMAIL ,
        self::CHANNEL_WHATSAPP ,
        self::CHANNEL_SMS
    ];

    protected $fillable = [
        'contact_id',
        'channel_type',
        'status',
        'subject',
    ];

    /**
     * Types de canaux possibles.
     */
    public const CHANNEL_EMAIL = 'email';
    public const CHANNEL_SMS = 'sms';
    public const CHANNEL_WHATSAPP = 'whatsapp';

    /**
     * Les statuts possibles.
     */
    public const STATUS_OPEN = 'open';
    public const STATUS_CLOSED = 'closed';


    public function contact(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }


    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class)->latest();
    }
}
