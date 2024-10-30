<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormationParticipant extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['formation_id', 'student_id', 'time'];

    protected $searchableFields = ['*'];

    protected $table = 'formation_participants';

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
