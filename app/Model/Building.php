<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = ["address", "firm_id", "geoposition"];

    public function firm()
    {
        return $this->belongsTo("App\Model\Firm");
    }
}
