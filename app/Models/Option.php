<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Option extends AppModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    //========================================== Relationships ==========================================

    /**
     * @return BelongsToMany
     */
    public function customizations(): BelongsToMany
    {
        return $this->belongsToMany(Customization::class);
    }
}
