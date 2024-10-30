<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'nickname',
        'bio',
        'image',
        'salaire',
        'slug',
        'school_name',
        'specialite',
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

    public function teacherSalaries()
    {
        return $this->hasMany(TeacherSalary::class);
    }

    public function teacherPayments()
    {
        return $this->hasMany(TeacherPayment::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    public function liveCourses()
    {
        return $this->hasMany(LiveCourse::class);
    }

    public function liveFormations()
    {
        return $this->hasMany(LiveFormation::class);
    }
}
