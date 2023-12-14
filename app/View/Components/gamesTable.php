<?php

namespace App\View\Components;

use App\Models\GamesModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class gamesTable extends Component
{
    public $games;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->games = GamesModel::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.games-table');
    }
}
