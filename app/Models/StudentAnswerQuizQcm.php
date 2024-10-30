<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentAnswerQuizQcm extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'questionQuizQcm_id',
        'student_id',
        'text',
        'is_correct',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'student_answer_quiz_qcms';

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function questionQuizQcm()
    {
        return $this->belongsTo(QuestionQuizQcm::class, 'questionQuizQcm_id');
    }
}
