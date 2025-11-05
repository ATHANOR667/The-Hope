<?php

namespace Modules\GalerieModule\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Modules\AdminBase\Traits\HasActivityLog;

class Comment extends Model
{
    use HasActivityLog, SoftDeletes;

    protected $keyType = 'string';

    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'parent_id',
        'content',
        'moderation_status',

        // Champs Polymorphiques
        'commenter_id',
        'commenter_type',

        // Champs Invité
        'guest_name',
        'guest_email',
    ];



    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class);
    }


    public function commenter(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function commenterName(): string
    {
        $commenter = $this->commenter_get();
        return $commenter->nom ?? 'Anonyme';
    }

    public function commenterType(): string
    {
        $commenter = $this->commenter_get();
        try {
             Relation::getMorphAlias($commenter) ;
             return $this->commenter_type ;
        }catch (\TypeError){
            return 'Visiteur' ;
        }
    }

    private function commenter_get(): object
    {
        $class = Relation::getMorphedModel($this->commenter_type);
        if ($class && $commenter = $class::find($this->commenter_id)) {
            return $commenter;
        }

        return (object)[
            'nom' => 'Anonyme',
            'type' => 'Visiteur',
        ];
    }


    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }


    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

}
