<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Nav extends Component
{

    public $items;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = config('nav');
    }

    public function isActive($activeRoute)
    {
        if (!$activeRoute) return '';
        return Route::is($activeRoute ?? '') ? 'active' : '';
    }

    public function isOpenedMenu($activeRoute)
    {
        return Route::is($activeRoute ?? '') ? 'menu-open' : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav');
    }
}
