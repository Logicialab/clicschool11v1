<?php

namespace App\Livewire\Public\Section;

use App\Models\Course;
use Livewire\Component;

class CourseSection extends Component
{
    public function render()
    {
        $courses = Course::take(8)->get();
        // dd($courses);
        return view('livewire.public.section.course-section',compact("courses"));
    }
}

// "id" => 4
// "subject_id" => 1
// "title" => "نادي المطالعة"
// "slug" => "doloribus-aliquip-hic-omnis-repudiandae-blanditiis-autem-velit"
// "description" => "Omnis laborum unde i"
// "image" => "01J4Z8H91YTKZESWZS5NPRJDPE.jpg"
// "body" => "Ad aut impedit ex e"
// "order" => 90
// "teacher_id" => 1
// "active" => 1
// "created_at" => "2024-08-10 19:53:08"
// "updated_at" => "2024-08-10 23:03:48"
// "deleted_at" => null
