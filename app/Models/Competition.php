<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'description',
        'date_start',
        'date_end',
        'file',
        'active',
        'classe_id',
        'slug',
        'order',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['slug'];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
        'active' => 'boolean',
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

    public function competitionQuestions()
    {
        return $this->hasMany(CompetitionQuestion::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
