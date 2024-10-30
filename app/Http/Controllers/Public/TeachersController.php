<?php

namespace App\Http\Controllers\Public;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
{
    public function show()
    {
        return view('public.teacher-profile');
    }
    public function show_slug($slug) {
        $teacher = Teacher::where("slug", $slug)->first();
        return view('livewire.public.teacher.show',compact('teacher'));
    }   
}
