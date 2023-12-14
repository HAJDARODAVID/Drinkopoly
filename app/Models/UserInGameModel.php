<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInGameModel extends Model
{
    use HasFactory;

    protected $table = 'users_in_games';
    public $timestamps = false;

    protected $fillable = [
        'game_id',
        'user_id'
    ];

    public function getPlayerInfo(): HasOne
    {
        return $this->hasONe(User::class, 'id','user_id');
    }

}
