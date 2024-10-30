<?php

namespace App\Http\Controllers\Backend;

use App\Models\Teacher;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\TeacherSalary;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\TeacherSalaryStoreRequest;
use App\Http\Requests\Backend\TeacherSalaryUpdateRequest;

class TeacherSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', TeacherSalary::class);

        $search = $request->get('search', '');

        $teacherSalaries = TeacherSalary::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.teacher_salaries.index',
            compact('teacherSalaries', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', TeacherSalary::class);

        $teachers = Teacher::pluck('first_name', 'id');

        return view('backend.teacher_salaries.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherSalaryStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', TeacherSalary::class);

        $validated = $request->validated();

        $teacherSalary = TeacherSalary::create($validated);

        return redirect()
            ->route('teacher-salaries.edit', $teacherSalary)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, TeacherSalary $teacherSalary): View
    {
        $this->authorize('view', $teacherSalary);

        return view('backend.teacher_salaries.show', compact('teacherSalary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, TeacherSalary $teacherSalary): View
    {
        $this->authorize('update', $teacherSalary);

        $teachers = Teacher::pluck('first_name', 'id');

        return view(
            'backend.teacher_salaries.edit',
            compact('teacherSalary', 'teachers')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TeacherSalaryUpdateRequest $request,
        TeacherSalary $teacherSalary
    ): RedirectResponse {
        $this->authorize('update', $teacherSalary);

        $validated = $request->validated();

        $teacherSalary->update($validated);

        return redirect()
            ->route('teacher-salaries.edit', $teacherSalary)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        TeacherSalary $teacherSalary
    ): RedirectResponse {
        $this->authorize('delete', $teacherSalary);

        $teacherSalary->delete();

        return redirect()
            ->route('teacher-salaries.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
