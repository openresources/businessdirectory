<?php

namespace App;

use App\Sluggable;
use App\Business;

class Sector extends Sluggable
{
 
    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
