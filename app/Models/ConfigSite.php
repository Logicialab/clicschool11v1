<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConfigSite extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'image',
        'description',
        'active',
        'url',
        'key',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'config_sites';

    protected $casts = [
        'active' => 'boolean',
    ];
}
