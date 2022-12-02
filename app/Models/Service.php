<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    const DEFAULT_INTERVAL = "05:00";

    protected $fillable = ['name', 'duration', 'interval', 'price'];

    protected $attributes = [
        "interval" => self::DEFAULT_INTERVAL,
    ];
}
