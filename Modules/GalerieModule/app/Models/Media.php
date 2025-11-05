<?php

namespace Modules\GalerieModule\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Modules\AdminBase\Traits\HasActivityLog;

class Media extends Model
{
    use HasActivityLog , SoftDeletes;

    protected $keyType = 'string';

    protected $table = 'post_media';

    protected $fillable = [
        'post_id', 'media_type', 'file_path', 'video_url', 'sort_order'
    ];


    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

}
