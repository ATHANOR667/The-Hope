<?php

namespace Modules\Donation\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    use HasFactory , HasUuids;

    protected $fillable = [
        'nom',
        'prenom',
        'emailDonateur',
        'reference',
        'devise',
        'montant',
        'status',
        'token',
        'operateur',
    ];


    protected $casts = [
        'montant' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function refunds(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Refund::class);
    }
}
