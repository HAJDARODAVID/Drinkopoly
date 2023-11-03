<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldParameterModel extends Model
{
    use HasFactory;

    const FIELD_C = 'background: rgb(34,193,195);background: linear-gradient(0deg, rgb(218, 109, 104) 0%, rgb(215, 171, 136) 100%)';
    const FIELD_C_C = 'background: rgb(34,193,195);background: linear-gradient(0deg, rgb(104, 43, 38) 0%, rgb(200, 69, 77) 100%)';


    protected $table = 'fields_parameters';
    protected $fillable = [
        'field_name',
        'p_name',
        'p_value',
    ];
    public $timestamps = false;
}
