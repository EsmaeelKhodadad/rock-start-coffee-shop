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
 * @property-read Product $product
 * @property-read Customization $customization
 * @property-read Option $option
 * @property-read string $human_readable_order
 * @property-read int $total_price
 */
class OrderItem extends AppModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $guarded = ['id', 'total_price'];
    /**
     * @var string[]
     */
    protected $appends = ['human_readable_order'];

    /**
     * @return string
     */
    public function getHumanReadableOrderAttribute(): string
    {
        $productTitle = $this->product->title;
        $customizationTitle = $this->customization->title ? ' => ' . $this->customization->title : '';
        $optionTitle = $this->option->title ? ' => ' . $this->option->title : '';
        return $productTitle . $customizationTitle . $optionTitle;
    }

    /**
     * @return int
     */
    public function getTotalPriceAttribute(): int
    {
        if ($this->product) {
            return ($this->product->price * $this->number);
        }
        return 0;
    }

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
