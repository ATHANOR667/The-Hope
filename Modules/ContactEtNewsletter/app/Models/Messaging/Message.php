<?php

namespace Modules\ContactEtNewsletter\Models\Messaging;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasUuids;

    protected $fillable = [
        'conversation_id',
        'content',
        'sent_at',

        'sender_id',
        'sender_type',
    ];

    protected $casts = [
        'sent_at' => 'datetime'
    ];


    public function conversation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }


    public function sender(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
