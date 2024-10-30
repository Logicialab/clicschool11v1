<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'classe_id',
        'name',
        'slug',
        'nickname',
        'home_adress',
        'street',
        'neighborhood',
        'city',
        'school_name',
        'student_level',
        'name_guardian',
        'Profession',
        'etablissement_travail',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['slug'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Generate the initial slug
            if (empty($model->slug)) {
                $slug = strtolower(str_replace(' ', '-', $model->name));
                $originalSlug = $slug;

                // Check for existing slugs and append a number if necessary
                $count = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }

                $model->slug = $slug;

                // Debugging: Log the generated slug
                logger()->info('Generated slug: ' . $model->slug);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function liveParticipants()
    {
        return $this->hasMany(LiveParticipant::class);
    }

    public function parentStudents()
    {
        return $this->hasMany(ParentStudent::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function formationParticipants()
    {
        return $this->hasMany(FormationParticipant::class);
    }

    public function competitionAnswers()
    {
        return $this->hasMany(CompetitionAnswer::class);
    }

    public function studentAnswerQuizQcms()
    {
        return $this->hasMany(StudentAnswerQuizQcm::class);
    }

    public function exerciceStudents()
    {
        return $this->hasMany(ExerciceStudent::class);
    }

    public function liveFormationParticipants()
    {
        return $this->hasMany(LiveFormationParticipant::class);
    }

    public function studentAnswerQuestionExerciceQcms()
    {
        return $this->hasMany(StudentAnswerQuestionExerciceQcm::class);
    }
}
