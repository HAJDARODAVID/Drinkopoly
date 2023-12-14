<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamesModel extends Model
{
    use HasFactory;

    const STATUS_INITIALIZED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DONE = 2;
    const STATUS_DISABLED = -1;

    protected $table = 'games';

    protected $fillable = [
        'status',
    ];

}
