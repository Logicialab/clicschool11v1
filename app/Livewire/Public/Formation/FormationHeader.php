<?php

namespace App\Livewire\Public\Formation;

use Livewire\Component;

class FormationHeader extends Component
{
    public $title;
    public $description;
    public $type;
    public $teacher;

    public function render()
    {
        return view('livewire.public.formation.formation-header');
    }
}
