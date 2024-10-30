<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClasseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'annee_scolaire' => $this->annee_scolaire,
            'level' => new LevelResource($this->level),
            'subjects' => SubjectResource::collection($this->subjects),
            'students' => StudentResource::collection($this->students),
            'competitions' => CompetitionResource::collection($this->competitions),
        ];
    }
}
