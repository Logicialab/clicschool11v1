<?php

namespace App\Livewire\Public\Section;

use App\Models\Formation;
use Livewire\Component;

class FormationCartSection extends Component
{
    public function render()
    {
        $formations = Formation::all();
        // dd($formations);
        return view('livewire.public.section.formation-cart-section',compact("formations"));
    }
}
