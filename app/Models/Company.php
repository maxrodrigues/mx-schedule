<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'document', 'phone', 'start_at', 'finish_at', 'start_lunch_at', 'finish_lunch_at'];

}
