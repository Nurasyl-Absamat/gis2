<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['phone_num'];

    public function firm()
    {
        return $this->belongsTo('App\Model\Firm');
    }
}
