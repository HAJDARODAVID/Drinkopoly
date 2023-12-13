<?php

namespace App\View\Components;

use App\Models\AdminMenuItemsModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminMenuItems extends Component
{
    public $routes;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->routes = AdminMenuItemsModel::get(); 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-menu-items');
    }
}
