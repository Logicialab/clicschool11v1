<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'formation_type_id',
        'description',
        'image',
        'status',
        'teacher_id',
        'active',
        'slug',
        'price',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['slug'];

    protected $casts = [
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

    public function formationParticipants()
    {
        return $this->hasMany(FormationParticipant::class);
    }

    public function formationType()
    {
        return $this->belongsTo(FormationType::class);
    }

    public function formationDetails()
    {
        return $this->hasMany(FormationDetail::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
