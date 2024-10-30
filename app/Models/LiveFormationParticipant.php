<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LiveFormationParticipant extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['time', 'live_formation_id', 'student_id'];

    protected $searchableFields = ['*'];

    protected $table = 'live_formation_participants';

    public function liveFormation()
    {
        return $this->belongsTo(LiveFormation::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
