<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic',
        'description',
        'image',
        'publish_date',
        'author',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'publish_date' => 'date',
    ];
}