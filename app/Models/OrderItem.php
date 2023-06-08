<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $customization_id
 * @property int $option_id
 * @property int $number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read BelongsTo $order
 * @property-read BelongsTo $product
 * @property-read BelongsTo $customization
 * @property-read BelongsTo $option
 */
class OrderItem extends AppModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function customization(): BelongsTo
    {
        return $this->belongsTo(Customization::class);
    }

    /**
     * @return BelongsTo
     */
    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}
