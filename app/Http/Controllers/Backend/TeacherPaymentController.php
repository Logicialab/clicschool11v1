<?php

namespace App\Http\Controllers\Backend;

use App\Models\Teacher;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\TeacherPayment;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\TeacherPaymentStoreRequest;
use App\Http\Requests\Backend\TeacherPaymentUpdateRequest;

class TeacherPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', TeacherPayment::class);

        $search = $request->get('search', '');

        $teacherPayments = TeacherPayment::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'backend.teacher_payments.index',
            compact('teacherPayments', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', TeacherPayment::class);

        $teachers = Teacher::pluck('first_name', 'id');

        return view('backend.teacher_payments.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherPaymentStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', TeacherPayment::class);

        $validated = $request->validated();

        $teacherPayment = TeacherPayment::create($validated);

        return redirect()
            ->route('teacher-payments.edit', $teacherPayment)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, TeacherPayment $teacherPayment): View
    {
        $this->authorize('view', $teacherPayment);

        return view('backend.teacher_payments.show', compact('teacherPayment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, TeacherPayment $teacherPayment): View
    {
        $this->authorize('update', $teacherPayment);

        $teachers = Teacher::pluck('first_name', 'id');

        return view(
            'backend.teacher_payments.edit',
            compact('teacherPayment', 'teachers')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TeacherPaymentUpdateRequest $request,
        TeacherPayment $teacherPayment
    ): RedirectResponse {
        $this->authorize('update', $teacherPayment);

        $validated = $request->validated();

        $teacherPayment->update($validated);

        return redirect()
            ->route('teacher-payments.edit', $teacherPayment)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        TeacherPayment $teacherPayment
    ): RedirectResponse {
        $this->authorize('delete', $teacherPayment);

        $teacherPayment->delete();

        return redirect()
            ->route('teacher-payments.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
