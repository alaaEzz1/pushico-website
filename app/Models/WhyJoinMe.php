<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyJoinMe extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'title',
        'short_desc'
    ];
}
