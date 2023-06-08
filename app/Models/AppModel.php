<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static active()
 */
class AppModel extends Model
{
    use HasFactory;

    /**
     * Scope a query to only include active users.
     *
     * @param Builder $query
     * @return void
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }
}
