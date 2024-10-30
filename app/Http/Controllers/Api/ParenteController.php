<?php

namespace App\Http\Controllers\Api;

use App\Models\Parente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParenteResource;
use App\Http\Resources\ParenteCollection;
use App\Http\Requests\Backend\ParenteStoreRequest;
use App\Http\Requests\Backend\ParenteUpdateRequest;

class ParenteController extends Controller
{
    public function index(Request $request): ParenteCollection
    {
        $this->authorize('view-any', Parente::class);

        $search = $request->get('search', '');

        $parentes = Parente::search($search)
            ->latest()
            ->paginate();

        return new ParenteCollection($parentes);
    }

    public function store(ParenteStoreRequest $request): ParenteResource
    {
        $this->authorize('create', Parente::class);

        $validated = $request->validated();

        $parente = Parente::create($validated);

        return new ParenteResource($parente);
    }

    public function show(Request $request, Parente $parente): ParenteResource
    {
        $this->authorize('view', $parente);

        return new ParenteResource($parente);
    }

    public function update(
        ParenteUpdateRequest $request,
        Parente $parente
    ): ParenteResource {
        $this->authorize('update', $parente);

        $validated = $request->validated();

        $parente->update($validated);

        return new ParenteResource($parente);
    }

    public function destroy(Request $request, Parente $parente): Response
    {
        $this->authorize('delete', $parente);

        $parente->delete();

        return response()->noContent();
    }
}
