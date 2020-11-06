<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    protected $fillable = ["title", "building_id"];
    protected $hidden = ['pivot'];

    public function phones()
    {
        return $this->hasMany("App\Models\Phone");
    }

    public function building()
    {
        return $this->belongsTo("App\Models\Building");
    }

    public function categories()
    {
        return $this->belongsToMany("App\Models\Category");
    }


}
