<?php

namespace App\View\Components;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
//        ddd(auth()->user()->pages());
//        ddd(request()->all());

//        ddd(\request()->route('page')->slug);

        return view('components.sidebar', [
            'pages' => auth()->user()->pages,
            'currentPage' => \request()->route('page')->slug
        ]);
    }
}
