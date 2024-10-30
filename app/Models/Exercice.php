<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercice extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'slug',
        'active',
        'file',
        'order',
        'solution',
        'file_solution',
        'active_solution',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['slug'];

    protected $casts = [
        'active' => 'boolean',
        'active_solution' => 'boolean',
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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function exerciceStudents()
    {
        return $this->hasMany(ExerciceStudent::class);
    }
}
