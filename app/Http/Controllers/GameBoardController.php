<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameParameterModel;
use App\Models\FieldParameterModel;
use Illuminate\Support\Facades\Log;

class GameBoardController extends Controller
{
    public function index(){
        Log::info('test');
        return view('gameBoard.gameBoard',[
            'gameBoardDisplay' => GameParameterModel::where('p_name', 'game_board_display')->first()->p_value,
            'adminBoardDisplay' => GameParameterModel::where('p_name', 'admin_board_display')->first()->p_value,
        ]);
    }
}
