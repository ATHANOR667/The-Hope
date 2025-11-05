<?php

namespace Modules\GalerieModule\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Modules\AdminBase\Traits\HasActivityLog;

class Post extends Model
{
    use HasActivityLog, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'gallery_posts';

    protected $fillable = [
        'title', 'description', 'slug', 'moderation_status', 'moderation_notes',
        'moderation_reason', 'published_at', 'author_id', 'author_type'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function authorName(): string
    {
        $author = $this->author_get();
        return $author->nom ?? 'Anonyme';
    }

    public function authorType(): string
    {
        $author = $this->author_get();
        return $author->type ?? 'Visiteur';
    }

    private function author_get(): object
    {
        $class = Relation::getMorphedModel($this->author_type);
        if ($class && $author = $class::find($this->author_id)) {
            return $author;
        }

        return (object)[
            'nom' => 'Anonyme',
            'type' => 'Visiteur',
        ];
    }



public function medias()
    {
        return $this->hasMany(Media::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Str::uuid();
        });
    }
}
