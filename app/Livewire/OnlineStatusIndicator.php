<?php

namespace App\Livewire;

use App\Http\Controllers\UserController;
use Livewire\Component;

class OnlineStatusIndicator extends Component
{
    public $user;
    public function render()
    {
        return view('livewire.online-status-indicator', [
            'isOnline' => UserController::getUserOnlineStatus($this->user)
        ]);
    }
}
