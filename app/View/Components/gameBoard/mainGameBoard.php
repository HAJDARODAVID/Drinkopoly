<?php

namespace App\View\Components\gameBoard;

use App\Models\FieldParameterModel;
use Closure;
use Illuminate\View\Component;
use App\Models\GameParameterModel;
use Illuminate\Contracts\View\View;

class mainGameBoard extends Component
{
    public $template;
    public $matrix;
    public $fields;
    public $fieldBackGroundColor;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->template = json_decode(GameParameterModel::where('p_name', 'game_template')->first()->p_value);
        $this->matrix = json_decode(GameParameterModel::where('p_name', 'game_matrix')->first()->p_value);
        $this->fields = GameParameterModel::where('p_name', 'game_fields_count')->first()->p_value;
        $this->fieldBackGroundColor = FieldParameterModel::where('p_name', 'background_color')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-board.main-game-board');
    }
}
