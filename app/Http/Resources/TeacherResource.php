<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'bio' => $this->bio,
            'image' => $this->image,
            'salaire' => $this->salaire,
            'school_name' => $this->school_name,
            'specialite' => $this->specialite,
            'teacher_salaries' => TeacherSalaryResource::collection($this->teacherSalaries),
            'teacher_payments' => TeacherPaymentResource::collection($this->teacherPayments),
            'lives' => LiveResource::collection($this->lives),
            'courses' => CourseResource::collection($this->courses),
            'formations' => FormationResource::collection($this->formations),
        ];
    }
}
