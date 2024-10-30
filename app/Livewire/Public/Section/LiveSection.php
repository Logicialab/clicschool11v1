<?php

namespace App\Livewire\Public\Section;


use App\Models\LiveCourse;
use Livewire\Component;

class LiveSection extends Component
{
    public function render()
    {
        $lives = LiveCourse::take(3)->get();
        return view('livewire.public.section.live-section',compact('lives'));
    }
}
