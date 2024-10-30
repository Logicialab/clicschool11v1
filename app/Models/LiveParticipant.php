<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LiveParticipant extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['liveCourse_id', 'student_id'];

    protected $searchableFields = ['*'];

    protected $table = 'live_participants';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function liveCourse()
    {
        return $this->belongsTo(LiveCourse::class, 'liveCourse_id');
    }
}
