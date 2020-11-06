<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'parent_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function firms()
    {
        return $this->belongsToMany('App\Models\Firm');
    }
    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
