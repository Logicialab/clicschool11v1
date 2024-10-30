<?php

namespace App\Livewire\Student\Subject;

use Livewire\Component;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;

class StudentIndexSubject extends Component
{
    public function render()
    {
        $user = Auth::user();
        // dd($user->wallets[0]->balance);
        $formations = Formation::take(5)->get();
        return view('livewire.student.subject.student-index-subject',compact('user',"formations"));
    }
}
