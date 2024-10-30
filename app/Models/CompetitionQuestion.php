<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetitionQuestion extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['competition_id', 'question', 'question_type'];

    protected $searchableFields = ['*'];

    protected $table = 'competition_questions';

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function competitionAnswers()
    {
        return $this->hasMany(CompetitionAnswer::class);
    }
}
