<?php

namespace App\View\Components\gameBoard;

use App\Models\FieldParameterModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class gameBoardField extends Component
{
    public $fieldId;
    public $fieldParameters;
    /**
     * Create a new component instance.
     */
    public function __construct($fieldId)
    {
        $this->fieldId = $fieldId;
        $this->fieldParameters = FieldParameterModel::where('field_name', 'field-'.$this->fieldId)->pluck('p_value','p_name')->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-board.game-board-field');
    }
}
