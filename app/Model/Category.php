<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'parent_id'];

    public function firms()
    {
        return $this->belongsToMany('App\Model\Firm');
    }
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
}
