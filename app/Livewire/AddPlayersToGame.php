<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AddPlayersToGame extends Component
{
    public $status;
    public $gameId;
    public $showModal=0;

    public function showModalAddUsersToGame(){
        $this->showModal = 1;
    }

    public function render()
    {
        return view('livewire.add-players-to-game', [
            'users' => User::get()
        ]);
    }
}
