<?php

namespace App\View\Components\public\website\card;

use App\Models\Teacher;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class teachers extends Component
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
        // dd(Teacher::take(10)->get());
        $teachers = Teacher::take(8)->get();
        return view('components.public.website.card.teachers',compact("teachers"));
    }
}
