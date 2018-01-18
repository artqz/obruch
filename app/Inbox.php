<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [
        'name', 'number', 'date', 'reg_number', 'reg_date', 'folder', 'is_hide', 'organization_id'
    ];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
