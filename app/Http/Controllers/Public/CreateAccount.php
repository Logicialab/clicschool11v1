<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Models\Classe;
use App\Models\Course;
use App\Models\Parente;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAccount extends Controller
{

    public function index()
    {
        // dd(Classe::all());
        return view('public.create-account', [
            'courses' => Course::all(),
            "classes" => Classe::all()
        ]);
    }


    public function indexParent(){
        return view('public.create-account-parent', [
            'courses' => Course::all(),
        ]);
    }


    public function store(Request $request) 
    {
        // dd($request);
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'username' => 'nullable|string|unique:users,username|max:255',
        //     'email' => 'required|string|email|unique:users,email|max:255',
        //     'password' => 'required|string|min:8|confirmed',
        //     'date_birth' => 'nullable|date',
        //     'phone' => 'nullable|string|max:20',
        //     'address' => 'nullable|string|max:255',
        //     'city' => 'nullable|string|max:255',
        //     'is_active' => 'required|boolean',
        //     'sexe' => 'nullable|string|max:10',
        //     'nickname' => 'nullable|string|max:255',
        //     'street' => 'nullable|string|max:255',
        //     'neighborhood' => 'nullable|string|max:255',
        //     'school_name' => 'nullable|string|max:255',
        //     'student_level' => 'nullable|string|max:255',
        //     'name_guardian' => 'nullable|string|max:255',
        //     'Profession' => 'nullable|string|max:255',
        //     'etablissement_travail' => 'nullable|string|max:255',
        // ]);

        // dd()
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'date_birth' => $request->date_birth,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'is_active' => false,
                'sexe' => $request->sexe,
            ]);

            // Create a new student
            $student = Student::create([
                'user_id' => $user->id,
                'classe_id' => 1, // Assuming a default or static class ID
                'name' => $user->name, // Use the same name for student
                'slug' => null, // Slug will be generated automatically
                'nickname' => $request->nickname, // Use request data for nickname
                'home_adress' => $request->address,
                'street' => $request->street,
                'neighborhood' => $request->neighborhood,
                'city' => $request->city,
                'school_name' => $request->school_name,
                'student_level' => $request->student_level,
                'name_guardian' => $request->name_guardian,
                'Profession' => $request->Profession,
                'etablissement_travail' => $request->etablissement_travail,
            ]);

            // dd($student);
            $user->assignRole('student');

            return redirect("/")->with('success', 'Successfully!');

    }


    public function storeParent(Request $request)   {

        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_birth' => $request->date_birth,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'is_active' => $request->is_active,
            'sexe' => $request->sexe,
        ]);

        $parent = Parente::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        $user->assignRole('parente');

        //dd($request->first_name_student);

        for ($i = 0; $i < count($request->first_name_student); $i++) {


            $user_stident = User::create([
                'name' => $request->first_name_student[$i] . ' ' . $request->last_name_student[$i],
                'username' => $request->username_student[$i],
                'email' => $request->email_student[$i],
                'password' => Hash::make($request->password_student[$i]),
                'date_birth' => $request->date_birth_student[$i],
                'phone' => $request->phone[$i],
                'address' => $request->address[$i],
                'city' => $request->city[$i],
                'is_active' => $request->is_active[$i],
                'sexe' => $request->sexe_student[$i],
            ]);

            

            $student = Student::create([
                'user_id' => $user_stident->id,
                'classe_id' => $request->classe_id_student[$i],
                'first_name' => $request->first_name_student[$i],
                'last_name' => $request->last_name_student[$i],
            ]);

            $user_stident->assignRole('student');

            DB::table('parent_students')->insert([
                'parente_id' => $parent->id, // Assuming parente_id is provided in the request
                'student_id' => $student->id,
            ]);
        }

        return redirect()->back()->with('success', 'Successfully!');


    }
}
