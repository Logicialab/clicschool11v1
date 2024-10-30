<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'description', 'price', 'duration'];

    protected $searchableFields = ['*'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
