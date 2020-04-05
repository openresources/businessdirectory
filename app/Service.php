<?php

namespace App;

use App\Sluggable;

class Service extends Sluggable
{
    public function businesses()
    {
        return $this->belongsToMany(Business::class);
    }
}
