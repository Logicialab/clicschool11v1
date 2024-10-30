<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizQcm extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'active',
        'slug',
        'order',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'quiz_qcms';

    protected $hidden = ['slug'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function questionQuizQcms()
    {
        return $this->hasMany(QuestionQuizQcm::class, 'quizqcm_id');
    }
}
