<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Cause extends Model
{
    use HasFactory , softDeletes;

    protected $fillable = [
        'titre',
        'description',
        'image',
        'montant',
        'effectif',
        'dateClotureContribution',
        'dateRealisation',
        'imagePostRealisation',
        'videoPostRealisation',
        'admin_id'
    ];

    public function dons(): HasMany
    {
        return $this->hasMany(Don::class);
    }

    public function volontaires(): HasMany
    {
        return $this->hasMany(Volontaire::class);
    }

    /**
     * @return Builder (montant, nom, prenom, email, etc.)
     *
     * Retourne les informations connues des différents donateurs
     * (enregistrés en tant que volontaires ou anonymes).
     */
    public function donnateurs(): Builder
    {
        return self::withTrashed()
            ->join('dons', 'causes.id', '=', 'dons.cause_id')
            ->leftJoin('volontaires', 'dons.volontaire_id', '=', 'volontaires.id')
            ->where('causes.id', $this->id)
            ->orderBy('dons.montant', 'desc')
            ->select([
                'dons.montant as montant',
                'dons.reference',
                'volontaires.nom as volontaire_nom',
                'volontaires.prenom as volontaire_prenom',
                'dons.nom as donateur_nom',
                'dons.prenom as donateur_prenom',
                'volontaires.adresse',
                'volontaires.nationalite',
                'volontaires.dateNaissance',
                'volontaires.sexe',
                DB::raw('COALESCE(volontaires.email, dons.emailDonateur) as email'),
                DB::raw('COALESCE(volontaires.nom, dons.nom) as nom'),
                DB::raw('COALESCE(volontaires.prenom, dons.prenom) as prenom'),
            ]);
    }
}
