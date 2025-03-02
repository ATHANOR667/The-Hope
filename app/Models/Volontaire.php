<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volontaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'nationalite',
        'dateNaissance',
        'sexe',
        'email',
        'password'
    ];

    public function dons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Don::class);
    }

    public function activites(): \Illuminate\Database\Eloquent\Collection|array
    {
        return self::query()
            ->join('cause_volontaire', 'cause_volontaire.volontaire_id' , '=', 'volontaires.id')
            ->join('causes', 'causes.id' , '=', 'cause_volontaire.cause_id' )
            ->get(['causes.titre as titre' ,'causes.description as description']);
    }
}
