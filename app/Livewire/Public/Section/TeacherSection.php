<?php

namespace App\Livewire\Public\Section;

use App\Models\Teacher;
use Livewire\Component;

class TeacherSection extends Component
{
    
    public function render()
    {
        
        $teachers = Teacher::take(8)->get();
        // dd($teachers);
        return view('livewire.public.section.teacher-section',compact("teachers"));
    }
}
