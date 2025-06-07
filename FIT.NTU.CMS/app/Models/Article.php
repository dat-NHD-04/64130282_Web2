<?php

namespace App\Models;

use App\ArticleStatus;
use Awcodes\Curator\Models\Media;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Illuminate\Support\Str;

class Article extends Model implements Viewable
{
    use HasFactory;
    use HasSEO;
    use InteractsWithViews;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'media_id',
        'user_id',
        'g_id',
    ];

    protected $casts = [
        'status' => ArticleStatus::class,
    ];

    public function scopeIsPublished(Builder $builder): Builder
    {
        return $builder->where('status', ArticleStatus::PUBLISHED);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: Str::limit(tiptap_converter()->asText($this->content, 100)),
            image: $this->image ? asset('storage/' . $this->image->path) : null,
        );
    }
}
