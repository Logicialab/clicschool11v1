<?php

namespace App\View\Components\public\website\card;

use App\Models\Live as ModelsLive;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class live extends Component
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
        return view('components.public.website.card.live', [
            'lives' => ModelsLive::join('teachers', 'lives.teacher_id', '=', 'teachers.id')
                        ->join('courses', 'lives.course_id', '=', 'courses.id')->take(3)->get()
        ]);
    }
}
