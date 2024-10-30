<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TeacherPayment;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherPaymentResource;
use App\Http\Resources\TeacherPaymentCollection;
use App\Http\Requests\Backend\TeacherPaymentStoreRequest;
use App\Http\Requests\Backend\TeacherPaymentUpdateRequest;

class TeacherPaymentController extends Controller
{
    public function index(Request $request): TeacherPaymentCollection
    {
        $this->authorize('view-any', TeacherPayment::class);

        $search = $request->get('search', '');

        $teacherPayments = TeacherPayment::search($search)
            ->latest()
            ->paginate();

        return new TeacherPaymentCollection($teacherPayments);
    }

    public function store(
        TeacherPaymentStoreRequest $request
    ): TeacherPaymentResource {
        $this->authorize('create', TeacherPayment::class);

        $validated = $request->validated();

        $teacherPayment = TeacherPayment::create($validated);

        return new TeacherPaymentResource($teacherPayment);
    }

    public function show(
        Request $request,
        TeacherPayment $teacherPayment
    ): TeacherPaymentResource {
        $this->authorize('view', $teacherPayment);

        return new TeacherPaymentResource($teacherPayment);
    }

    public function update(
        TeacherPaymentUpdateRequest $request,
        TeacherPayment $teacherPayment
    ): TeacherPaymentResource {
        $this->authorize('update', $teacherPayment);

        $validated = $request->validated();

        $teacherPayment->update($validated);

        return new TeacherPaymentResource($teacherPayment);
    }

    public function destroy(
        Request $request,
        TeacherPayment $teacherPayment
    ): Response {
        $this->authorize('delete', $teacherPayment);

        $teacherPayment->delete();

        return response()->noContent();
    }
}
