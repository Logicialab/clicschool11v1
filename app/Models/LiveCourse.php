<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LiveCourse extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'course_id',
        'teacher_id',
        'url',
        'scheduled_at',
        'duration',
        'active',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'live_courses';

    protected $casts = [
        'scheduled_at' => 'datetime',
        'active' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function liveParticipants()
    {
        return $this->hasMany(LiveParticipant::class, 'liveCourse_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
