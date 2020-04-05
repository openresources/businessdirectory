<?php

namespace App;

use App\User;
use App\Sluggable;
use App\Service;
use App\Category;

class Business extends Sluggable
{
    protected $guarded = [];

    protected $casts = [
        'business_hours' => 'json',
        'search_keywords' => 'json',
        'establishment_date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
