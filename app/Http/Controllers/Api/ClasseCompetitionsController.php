<?php

namespace App\Http\Controllers\Api;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\CompetitionCollection;

class ClasseCompetitionsController extends Controller
{
    public function index(
        Request $request,
        Classe $classe
    ): CompetitionCollection {
        $this->authorize('view', $classe);

        $search = $request->get('search', '');

        $competitions = $classe
            ->competitions()
            ->search($search)
            ->latest()
            ->paginate();

        return new CompetitionCollection($competitions);
    }

    public function store(Request $request, Classe $classe): CompetitionResource
    {
        $this->authorize('create', Competition::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date'],
            'order' => ['nullable', 'numeric'],
            'slug' => [
                'nullable',
                'unique:competitions,slug',
                'max:255',
                'string',
            ],
            'file' => ['file', 'max:1024', 'nullable'],
            'active' => ['required', 'boolean'],
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $competition = $classe->competitions()->create($validated);

        return new CompetitionResource($competition);
    }
}
