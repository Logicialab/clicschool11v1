<?php

namespace App\Livewire\Public\Pages;

use Livewire\Component;
use App\Models\Formation;

class FormationSingle extends Component
{
    public $formation;

    public function mount($slug)
    {
        // Fetch the formation based on the slug
        $this->formation = Formation::where('slug', $slug)->firstOrFail();
        // dd($this->formation);
    }

    public function render()
    {
        return view('livewire.public.pages.formation-single');
    }
}
