<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Resources\MenuResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuCollection;

class MenuMenusController extends Controller
{
    public function index(Request $request, Menu $menu): MenuCollection
    {
        $this->authorize('view', $menu);

        $search = $request->get('search', '');

        $menus = $menu
            ->menus()
            ->search($search)
            ->latest()
            ->paginate();

        return new MenuCollection($menus);
    }

    public function store(Request $request, Menu $menu): MenuResource
    {
        $this->authorize('create', Menu::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'url' => ['required', 'url'],
        ]);

        $menu = $menu->menus()->create($validated);

        return new MenuResource($menu);
    }
}
