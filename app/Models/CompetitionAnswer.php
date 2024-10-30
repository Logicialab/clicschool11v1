<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetitionAnswer extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'competition_question_id',
        'student_id',
        'text',
        'is_correct',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'competition_answers';

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function competitionQuestion()
    {
        return $this->belongsTo(CompetitionQuestion::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
