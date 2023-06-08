<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends AppModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];
}
