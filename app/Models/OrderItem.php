<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $customization_id
 * @property int $option_id
 * @property int $number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class OrderItem extends AppModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];
}
