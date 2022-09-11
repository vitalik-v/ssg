<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @mixin Eloquent
 */
class EventStatuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];
}
