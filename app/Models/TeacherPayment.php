<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherPayment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'teacher_id',
        'amount',
        'payment_date',
        'description',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'teacher_payments';

    protected $casts = [
        'payment_date' => 'date',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
