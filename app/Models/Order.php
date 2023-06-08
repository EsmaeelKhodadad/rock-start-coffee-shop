<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $user_id
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read BelongsTo $user
 * @property-read HasMany $orderItems
 */
class Order extends AppModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];
    /**
     * @var string
     */
    public const STATUS_WAITING = 'waiting';
    /**
     * @var string
     */
    public const STATUS_PREPARATION = 'preparation';
    /**
     * @var string
     */
    public const STATUS_READY = 'ready';
    /**
     * @var string
     */
    public const STATUS_DELIVERED = 'delivered';
    /**
     * @var string[]
     */
    public const STATUSES = [
        self::STATUS_WAITING,
        self::STATUS_PREPARATION,
        self::STATUS_READY,
        self::STATUS_DELIVERED,
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
