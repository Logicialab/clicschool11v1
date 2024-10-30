<?php

namespace App\Http\Controllers\Backend;

use App\Models\Parente;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ParentStudent;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\ParentStudentStoreRequest;
use App\Http\Requests\Backend\ParentStudentUpdateRequest;

class ParentStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ParentStudent::class);

        $search = $request->get('search', '');

        $parentStudents = ParentStudent::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.parent_students.index',
            compact('parentStudents', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ParentStudent::class);

        $parentes = Parente::pluck('first_name', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.parent_students.create',
            compact('parentes', 'students')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParentStudentStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ParentStudent::class);

        $validated = $request->validated();

        $parentStudent = ParentStudent::create($validated);

        return redirect()
            ->route('parent-students.edit', $parentStudent)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ParentStudent $parentStudent): View
    {
        $this->authorize('view', $parentStudent);

        return view('backend.parent_students.show', compact('parentStudent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ParentStudent $parentStudent): View
    {
        $this->authorize('update', $parentStudent);

        $parentes = Parente::pluck('first_name', 'id');
        $students = Student::pluck('first_name', 'id');

        return view(
            'backend.parent_students.edit',
            compact('parentStudent', 'parentes', 'students')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ParentStudentUpdateRequest $request,
        ParentStudent $parentStudent
    ): RedirectResponse {
        $this->authorize('update', $parentStudent);

        $validated = $request->validated();

        $parentStudent->update($validated);

        return redirect()
            ->route('parent-students.edit', $parentStudent)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ParentStudent $parentStudent
    ): RedirectResponse {
        $this->authorize('delete', $parentStudent);

        $parentStudent->delete();

        return redirect()
            ->route('parent-students.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
