<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherSalary extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['teacher_id', 'montly_salary', 'paid_at', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'teacher_salaries';

    protected $casts = [
        'paid_at' => 'date',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
