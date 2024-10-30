<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionQuizQcm extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quizqcm_id',
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

    protected $table = 'question_quiz_qcms';

    public function studentAnswerQuizQcms()
    {
        return $this->hasMany(
            StudentAnswerQuizQcm::class,
            'questionQuizQcm_id'
        );
    }

    public function quiz_qcm()
    {
        return $this->belongsTo(QuizQcm::class, 'quizqcm_id');
    }
}
