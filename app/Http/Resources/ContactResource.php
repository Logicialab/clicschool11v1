<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'active' => $this->active,
            'subject' => new SubjectResource($this->subject),
            'videos' => VideoResource::collection($this->videos),
            'files' => FileResource::collection($this->files),
            'lives' => LiveResource::collection($this->lives),
            'exercices' => ExerciceResource::collection($this->exercices),
            'quizzes' => QuizResource::collection($this->quizzes),
            'teacher' => new TeacherResource($this->teacher),
        ];
    }
}
