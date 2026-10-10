<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'guests',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'guests' => 'integer',
        ];
    }
}
