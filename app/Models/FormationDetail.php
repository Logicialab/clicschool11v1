<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormationDetail extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'formation_id',
        'title',
        'url',
        'description',
        'file',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'formation_details';

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
