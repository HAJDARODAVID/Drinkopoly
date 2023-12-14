<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInGameModel extends Model
{
    use HasFactory;

    protected $table = 'users_in_games';
    public $timestamps = false;

    protected $fillable = [
        'game_id',
        'user_id'
    ];
}
