<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    protected $fillable = ["title", "building_id"];

    public function phones()
    {
        return $this->hasMany("App\Model\Phone");
    }

    public function building()
    {
        return $this->hasOne("App\Model\Building");
    }

    public function categories()
    {
        return $this->belongsToMany("App\Model\Category");
    }
}
