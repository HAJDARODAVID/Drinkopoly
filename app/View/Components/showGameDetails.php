<?php

namespace App\View\Components;

use App\Models\UserInGameModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class showGameDetails extends Component
{
    public $gameID;
    public $users;
    /**
     * Create a new component instance.
     */
    public function __construct($gameID)
    {
        $this->gameID = $gameID;
        $this->users = UserInGameModel::where('game_id', $this->gameID)->with('getPlayerInfo')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-game-details');
    }
}
