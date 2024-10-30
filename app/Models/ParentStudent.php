<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParentStudent extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['parente_id', 'student_id'];

    protected $searchableFields = ['*'];

    protected $table = 'parent_students';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function parente()
    {
        return $this->belongsTo(Parente::class);
    }
}
