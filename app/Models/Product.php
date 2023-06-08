<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
