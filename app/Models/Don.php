<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Don extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'reference',
        'devise',
        'montant',
        'emailDonateur'  ,
        'cause_id' ,
        'volontaire_id' ,
    ];

    public function cause(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cause::class);
    }





}
