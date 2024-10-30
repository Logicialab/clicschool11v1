<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'unitCourse_id',
        'title',
        'slug',
        'description',
        'image',
        'body',
        'order',
        'teacher_id',
        'active',
        'content_json',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['slug'];

    protected $casts = [
        'active' => 'boolean',
        'content_json' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Generate the initial slug
            if (empty($model->slug)) {
                $slug = strtolower(str_replace(' ', '-', $model->title));
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

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function exercices()
    {
        return $this->hasMany(Exercice::class);
    }

    public function quizzes()
    {
        return $this->hasMany(QuizQcm::class, 'course_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function unitCourse()
    {
        return $this->belongsTo(UnitCourse::class, 'unitCourse_id');
    }

    public function liveCourses()
    {
        return $this->hasMany(LiveCourse::class);
    }

    public function exerciceQcms()
    {
        return $this->hasMany(ExerciceQcm::class);
    }
}
