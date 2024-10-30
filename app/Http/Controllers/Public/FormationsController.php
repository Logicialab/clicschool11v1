<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationsController extends Controller
{
    public function index()
    {
        return view('public.formations');
    }

    public function show_old()
    {
        return view('public.formations-single');
    }

    public function show(string $slug)
    {
        $formation = Formation::where('slug', $slug)->firstOrFail();

        return view('formations.show', compact('formation'));
    }
}
