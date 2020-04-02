<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $guarded = [];

    protected $casts = [
        'business_sectors' => 'json',
        'services' => 'json',
        'business_hours' => 'json',
        'search_keywords' => 'json',
        'business_establishment_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
