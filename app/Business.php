<?php

namespace App;

use Spatie\Tags\HasTags;
use Laravel\Scout\Searchable;
use App\User;
use App\Sluggable;
use App\Service;
use App\Sector;
use App\Category;

class Business extends Sluggable
{

    use HasTags, Searchable;


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

    public function servicesList()
    {
        return self::services()->pluck('name');
    }
    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     $array = $this->transform($array);

    //     $array['sector_name'] = $this->sector->name;

    //     return $array;
    // }
}
