<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserInGameModel;
use Livewire\Component;

class AddPlayersToGame extends Component
{
    public $status;
    public $gameId;
    public $showModal=0;

    public function showModalAddUsersToGame(){
        $this->showModal = 1;
    }

    public function addPlayerToGame($user, $game){
        UserInGameModel::create([
            'user_id' => $user,
            'game_id' => $game
        ]);
    }

    public function removePlayerFromGame($user){
        UserInGameModel::where('user_id', $user)->delete();
    }

    public function render()
    {
        return view('livewire.add-players-to-game', [
            'users' => User::with('getPlayersGame')->get()
        ]);
    }
}
