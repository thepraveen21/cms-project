<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'qualification',
        'image',
        'location',
        'job_type',
        'salary',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'salary' => 'decimal:2',
    ];
}