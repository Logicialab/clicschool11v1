<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Parente;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\ParenteStoreRequest;
use App\Http\Requests\Backend\ParenteUpdateRequest;

class ParenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Parente::class);

        $search = $request->get('search', '');

        $parentes = Parente::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('backend.parentes.index', compact('parentes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Parente::class);

        $users = User::pluck('name', 'id');

        return view('backend.parentes.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParenteStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Parente::class);

        $validated = $request->validated();

        $parente = Parente::create($validated);

        return redirect()
            ->route('parentes.edit', $parente)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Parente $parente): View
    {
        $this->authorize('view', $parente);

        return view('backend.parentes.show', compact('parente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Parente $parente): View
    {
        $this->authorize('update', $parente);

        $users = User::pluck('name', 'id');

        return view('backend.parentes.edit', compact('parente', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ParenteUpdateRequest $request,
        Parente $parente
    ): RedirectResponse {
        $this->authorize('update', $parente);

        $validated = $request->validated();

        $parente->update($validated);

        return redirect()
            ->route('parentes.edit', $parente)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Parente $parente
    ): RedirectResponse {
        $this->authorize('delete', $parente);

        $parente->delete();

        return redirect()
            ->route('parentes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
