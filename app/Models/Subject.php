<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'discription', 'slug', 'image'];

    protected $searchableFields = ['*'];

    protected $hidden = ['slug'];

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

    public function unitCourses()
    {
        return $this->hasMany(UnitCourse::class);
    }
}
