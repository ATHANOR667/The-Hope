<?php

namespace Modules\Donation\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Refund extends Model
{
    use HasFactory , SoftDeletes , HasUuids;

    protected $fillable = [
        'don_id',
        'payment_intent_id',
        'refund_id',
        'status',
        'operateur',
        'montant',
        'devise',
    ];

    /**
     * Relation vers le don original.
     */
    public function don(): BelongsTo
    {
        return $this->belongsTo(Don::class);
    }
}
