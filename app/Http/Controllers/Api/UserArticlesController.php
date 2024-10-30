<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleCollection;

class UserArticlesController extends Controller
{
    public function index(Request $request, User $user): ArticleCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $articles = $user
            ->articles()
            ->search($search)
            ->latest()
            ->paginate();

        return new ArticleCollection($articles);
    }

    public function store(Request $request, User $user): ArticleResource
    {
        $this->authorize('create', Article::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'active' => ['nullable', 'boolean'],
            'description' => ['nullable', 'max:255', 'string'],
            'content' => ['nullable', 'max:255', 'string'],
            'featured' => ['nullable', 'boolean'],
            'slug' => ['nullable', 'unique:articles,slug', 'max:255', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $article = $user->articles()->create($validated);

        return new ArticleResource($article);
    }
}
