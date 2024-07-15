<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'desc',
        'action_url'
    ];
}
