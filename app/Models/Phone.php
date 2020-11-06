<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['phone_num', 'firm_id'];

    public function firm()
    {
        return $this->belongsTo('App\Models\Firm');
    }
}
