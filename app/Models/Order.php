<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
