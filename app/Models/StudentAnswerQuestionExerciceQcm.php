<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentAnswerQuestionExerciceQcm extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'question_exercice_qcm_id',
        'student_id',
        'reponse',
        'is_correct',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'student_answer_question_exercice_qcms';

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function questionExerciceQcm()
    {
        return $this->belongsTo(QuestionExerciceQcm::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
