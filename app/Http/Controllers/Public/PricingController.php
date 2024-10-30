<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        return view('public.pricing');
    }

    public  function show()     
    {
        return view('public.pricing-details');
    }
}
