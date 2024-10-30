<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParenteResource;
use App\Http\Resources\ParenteCollection;

class UserParentesController extends Controller
{
    public function index(Request $request, User $user): ParenteCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $parentes = $user
            ->parentes()
            ->search($search)
            ->latest()
            ->paginate();

        return new ParenteCollection($parentes);
    }

    public function store(Request $request, User $user): ParenteResource
    {
        $this->authorize('create', Parente::class);

        $validated = $request->validate([
            'first_name' => ['required', 'max:255', 'string'],
            'last_name' => ['required', 'max:255', 'string'],
        ]);

        $parente = $user->parentes()->create($validated);

        return new ParenteResource($parente);
    }
}
