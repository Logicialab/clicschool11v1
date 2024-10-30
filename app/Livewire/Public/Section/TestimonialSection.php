<?php

namespace App\Livewire\Public\Section;

use App\Models\Testimonial;
use Livewire\Component;

class TestimonialSection extends Component
{
    public function render()
    {
        $testimonials = Testimonial::take(6)->get();
        // dd($testimonials);
        return view('livewire.public.section.testimonial-section',compact('testimonials'));
    }
}
