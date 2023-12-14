<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UsersTable extends Component
{
    public $users;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->users = User::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users-table');
    }
}
