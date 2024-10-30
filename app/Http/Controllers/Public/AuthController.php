<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function get_login() {
        return view('livewire.public.auth.login');
    }
    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Get the authenticated user ID
        $user = Auth::user();

        // Get the user with the associated role
        $roles = $user->getRoleNames();

        // dd($roles);
        
        foreach($roles as $role){
            if($role == "super-admin")
            {
                return redirect("/Administrator");
            }
            elseif($role == "teacher")
            {
                // dd("teacher-akjksq");
                return redirect()->route('teacher.dashboard');
            }
            elseif($role == 'parente')
            {
                return redirect()->route('parente.dashboard');
            }
            elseif($role == 'student')
            {
                return redirect()->route('student.dashboard');
            }
            
        }

        return redirect("/");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
