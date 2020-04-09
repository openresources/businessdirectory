<?php

namespace App;

use App\Category;
use App\Sector;
use App\Service;
use App\Sluggable;
use App\User;
use Laravel\Scout\Searchable;

class Business extends Sluggable
{

    use Searchable;

    protected $guarded = [];

    protected $casts = [
        'business_hours' => 'json',
        'search_keywords' => 'json',
        'establishment_date' => 'date',
    ];

    protected $touches = ['sector'];

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

    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     $array = $this->transform($array);

    //     $array['sector_name'] = $this->sector->name;

    //     return $array;
    // }
}
