<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherPaymentResource;
use App\Http\Resources\TeacherPaymentCollection;

class TeacherTeacherPaymentsController extends Controller
{
    public function index(
        Request $request,
        Teacher $teacher
    ): TeacherPaymentCollection {
        $this->authorize('view', $teacher);

        $search = $request->get('search', '');

        $teacherPayments = $teacher
            ->teacherPayments()
            ->search($search)
            ->latest()
            ->paginate();

        return new TeacherPaymentCollection($teacherPayments);
    }

    public function store(
        Request $request,
        Teacher $teacher
    ): TeacherPaymentResource {
        $this->authorize('create', TeacherPayment::class);

        $validated = $request->validate([
            'amount' => ['required', 'numeric'],
            'payment_date' => ['required', 'date'],
            'description' => ['nullable', 'max:255', 'string'],
        ]);

        $teacherPayment = $teacher->teacherPayments()->create($validated);

        return new TeacherPaymentResource($teacherPayment);
    }
}
