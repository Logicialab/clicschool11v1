<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionExerciceQcm extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'exercice_qcm_id',
        'title',
        'type',
        'description',
        'q1',
        'q2',
        'q3',
        'q4',
        'answer',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'question_exercice_qcms';

    public function exerciceQcm()
    {
        return $this->belongsTo(ExerciceQcm::class);
    }

    public function studentAnswerQuestionExerciceQcms()
    {
        return $this->hasMany(StudentAnswerQuestionExerciceQcm::class);
    }
}
