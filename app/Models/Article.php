<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'active',
        'description',
        'content',
        'featured',
    ];

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

    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
