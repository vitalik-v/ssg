<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int|null $like
 * @property User $user
 * @property int $event_status_id
 * @property Office $office
 * @property Topic $topic
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @mixin Eloquent
 */
class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'user',
        'like',
        'office_id',
        'topic_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function status(): hasOne
    {
        return $this->hasOne(EventStatuses::class);
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }
}
