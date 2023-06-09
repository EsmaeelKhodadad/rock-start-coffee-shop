<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $creator_id
 * @property string $title
 * @property int $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read BelongsToMany $customizations
 * @property-read BelongsTo $creator
 */
class Product extends AppModel
{
    use HasFactory;

    /**
     * @var int
     */
    public const CONSTANT_PRICE = 50000;
    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * @return BelongsToMany
     */
    public function customizations(): BelongsToMany
    {
        return $this->belongsToMany(Customization::class);
    }

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
