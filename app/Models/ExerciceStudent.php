<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExerciceStudent extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'exercice_id',
        'student_id',
        'file',
        'content',
        'is_correct',
        'note'
    ];

    protected $searchableFields = ['*'];

    protected $table = 'exercice_students';

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
