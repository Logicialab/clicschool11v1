<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormationType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'formation_types';

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
