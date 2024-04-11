<?php

namespace App\View\Components;

use App\Http\Controllers\Services\MenuService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarMenu extends Component
{
    public $menuService;

    /**
     * Create a new component instance.
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = $this->menuService->renderMenu(auth()->user());
                
        return view('components.sidebar', compact('menu'));
    }
}
