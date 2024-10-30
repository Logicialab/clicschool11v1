<?php

namespace App\Http\Controllers\teacher;

use App\Models\Teacher;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\FormationType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\FormationStoreRequest;
use App\Models\Course;

class DashboardTeacherController extends Controller
{
    public function index() {
        return view('teacher.pages.index');
    }

    public function formations() {
        $id_user = Auth::user()->id;
        
        // Use first() instead of find()
        $teacher = Teacher::where('user_id', $id_user)->first();
        
        // Check if teacher exists
        if ($teacher) {
            // Fetch formations (or courses) created by this teacher
            $formations = Formation::where('teacher_id', $teacher->id)->get();
        } else {
            // Handle the case where the authenticated user is not a teacher
            $formations = collect(); // Empty collection
        }
        // dd($formations);
        return view('teacher.formations.index',compact('formations'));
    }

    public function courses() {
        $id_user = Auth::user()->id;
        
        // Use first() instead of find()
        $teacher = Teacher::where('user_id', $id_user)->first();
        
        // Check if teacher exists
        if ($teacher) {
            // Fetch formations (or courses) created by this teacher
            $courses = Course::where('teacher_id', $teacher->id)->get();
        } else {
            // Handle the case where the authenticated user is not a teacher
            $courses = collect(); // Empty collection
        }
        // dd($formations);
        return view('teacher.courses.index',compact('courses'));
    }

    public function course_show($slug) {
        $course = Course::where('slug',$slug)->first();
        // dd($subject->courses);
        // dd($slug);
        return view('teacher.courses.show',compact('course'));
    }

    public function formation_create() {
        $formationTypes = FormationType::all();
        
        // Pass the formation types to the view
        return view('teacher.formations.create', compact('formationTypes'));
    }

    public function old_formation_store(Request $request) {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:60',
            'formation_type_id' => 'required|exists:formation_types,id',
            'description' => 'required|string',
            'status' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Get the current teacher
        $teacher = Teacher::where('user_id', Auth::id())->first();
        dd($image = $request->image);
        // If the teacher exists, create the formation
        if ($teacher) {
            // Handle the image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('formations', $imageName, 'public'); // Store the image in the 'public/formations' directory
            }
    
            // Create the formation
            $formation = new Formation([
                'name' => $request->input('name'),
                'formation_type_id' => $request->input('formation_type_id'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
                'teacher_id' => $teacher->id,
                'image' => $imagePath, // Save the path to the image
                'active' => true, // or set this based on some condition
            ]);
    
            // Save the formation
            $formation->save();
    
            return redirect()->route('teacher.formations')->with('success', 'Formation created successfully.');
        } else {
            return redirect()->back()->withErrors('You are not authorized to create formations.');
        }
    }

    public function formation_store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'formation_type_id' => 'required|exists:formation_types,id',
            'description' => 'required|string',
            'status' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the current teacher
        $teacher = Teacher::where('user_id', Auth::id())->first();

        // Initialize image path
        $imagePath = null;
        // dd($request->hasFile('image'));
        // Handle image upload if a file is present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public');

            $imagePath = str_replace('public/', '', $imagePath);
        }

        // dd($imagePath);
        // Create a new formation
        $formation = new Formation([
            'name' => $validated['name'],
            'formation_type_id' => $validated['formation_type_id'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'teacher_id' => $teacher->id,
            'image' => $imagePath, // Save the path to the image
            'active' => false, // or set this based on some condition
        ]);

        // Save the formation
        $formation->save();

        return redirect()->route('teacher.formations')->with('success', 'Formation created successfully.');
    }
    

    public function reviews() {
        return view('teacher.pages.reviews');
    }

    public function earnings() {
        return view('teacher.pages.earnings');
    }

    public function orders() {
        return view('teacher.pages.orders');
    }

    public function students() {
        return view('teacher.pages.students');
    }

    public function payouts() {
        return view('teacher.pages.payouts');
    }

    public function quiz() {
        return view('teacher.pages.quiz');
    }

    public function quizresult() {
        return view('teacher.pages.quizresult');
    }

    public function profiledit() {
        return view('teacher.pages.profiledit');
    }

    public function security() {
        return view('teacher.pages.security');
    }

    public function socialprofile() {
        return view('teacher.pages.socialprofile');
    }

    public function notifications() {
        return view('teacher.pages.notifications');
    }

    public function profileprivacy() {
        return view('teacher.pages.profileprivacy');
    }

    public function deleteprofile() {
        return view('teacher.pages.deleteprofile');
    }

    public function linkedaccounts() {
        return view('teacher.pages.linkedaccounts');
    }

}