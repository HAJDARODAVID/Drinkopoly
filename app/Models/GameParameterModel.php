<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameParameterModel extends Model
{
    use HasFactory;

    protected $table = 'game_parameters';

    public $timestamps = false;
}
