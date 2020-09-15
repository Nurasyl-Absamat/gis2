<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = ["address", "geoposition"];

    public function firms()
    {
        return $this->hasMany("App\Firm");
    }
}
