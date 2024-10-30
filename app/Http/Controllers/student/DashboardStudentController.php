<?php

namespace App\Http\Controllers\student;

use App\Models\File;
use App\Models\Classe;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Formation;
use App\Models\Student;
use App\Models\UnitCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 

class DashboardStudentController extends Controller
{
    public function index() { 
        $user = Auth::user();
        // dd($user->wallets[0]->balance);
        $formations = Formation::take(5)->get();
        return view('student.pages.index',compact('user',"formations"));
    } 
 
    
    public function unitcourses() {
        $user = Auth::user();
        $classe = Classe::find($user->students[0]->classe_id);
        // dd($classe->unitCourses);
        $unitCourses = $classe->unitCourses;

        // dd($unitCourses[0]->subject->image);
        return view('student.unitcourses.index',compact('unitCourses','classe'));
    }

    public function getUniqueSubjects()
    {
        // Get the authenticated student's ID
        
        // $studentId = Student::where('user_id',Auth::id())->find();
        $student =Auth::user()->students[0];
        // Fetch the student and the associated class
        $student = Student::with('classe.unitCourses.subject')->find($student->id);
        // dd( Student::with('classe.unitCourses.subject')->find($studentId));
        // if (!$student || !$student->classe) {
        //     return response()->json(['message' => 'Student or class not found'], 404);
        // }

        $classe = Classe::find($student->classe_id);

        // dd($student->classe->unitCourses->pluck('subject')->unique('id'));
        // Retrieve the subjects from the student's class and make sure they are unique
        $subjects = $student->classe->unitCourses->pluck('subject')->unique('id');

        // dd($subjects);
        // return response()->json($subjects);
        return view('student.subjects.index',compact('subjects',"classe"));
    }

    public function subjects() {
        $user = Auth::user();
        $classe = Classe::find($user->students[0]->classe_id);
        // dd($classe->unitCourses);
        $unitCourses = $classe->unitCourses;

        // dd($unitCourses[0]->subject->image);
        return view('student.subjects.index',compact('unitCourses','classe'));
    }

    public function subjects_show($slug) {
        $subject = Subject::where('slug',$slug)->first();
        // dd($subject->unitCourses);
        return view('student.pages.courses',compact('subject'));
    }

    public function course_show($slug) {
        $unitCourse = UnitCourse::where('slug',$slug)->first();
        // $course = Course::where('slug',$slug)->first();
        // dd($unitCourse->courses);
        return view('student.unitcourses.index',compact('unitCourse'));
    }

    public function course_show_show($slug) {
        $course = Course::where('slug',$slug)->first();
        // dd($course);
        return view('student.courses.index2',compact('course'));
    }

    public function quiz_show($slug) {
        $course = Course::where('slug',$slug)->first();
        dd($course);
        return view('student.courses.show',compact('course'));
    }

    public function competition() {
        $user = Auth::user();
        $classe = Classe::find($user->students[0]->classe_id);

        $competitions = Competition::all();
        return view('student.pages.competition',compact('competitions',"classe"));
    }

    public function profiledit() {
        $user = Auth::user();
        $student = Student::find($user->students[0]);
        // dd($student);
        return view('student.pages.profiledit',compact('user','student'));
    }    

    

    public function formations() {
        $formations = Formation::all();
        return view('student.formations.index',compact('formations'));
    }

    public function courses() {
        return view('student.pages.courses');
    }

    public function reviews() {
        return view('student.pages.reviews');
    }

    public function earnings() {
        return view('student.pages.earnings');
    }

    public function orders() {
        return view('student.pages.orders');
    }

    public function students() {
        return view('student.pages.students');
    }

    public function payouts() {
        return view('student.pages.payouts');
    }

    

    public function quizresult() {
        return view('student.pages.quizresult');
    }


    public function security() {
        return view('student.pages.security');
    }

    public function socialprofile() {
        return view('student.pages.socialprofile');
    }

    public function notifications() {
        return view('student.pages.notifications');
    }

    public function profileprivacy() {
        return view('student.pages.profileprivacy');
    }

    public function deleteprofile() {
        return view('student.pages.deleteprofile');
    }

    public function linkedaccounts() {
        return view('student.pages.linkedaccounts');
    }
    public function subscriptions() {
        return view('student.pages.subscriptions');
    }
    public function billinginfo() {
        return view('student.pages.billinginfo');
    }
    public function paymentmethod() {
        $user = Auth::user();
        return view('student.pages.paymentmethod',compact('user'));
    }
    public function invoice() {
        return view('student.pages.invoice');
    }
    public function studentquiz() {
        return view('student.pages.studentquiz');
    }
}
