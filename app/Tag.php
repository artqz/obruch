<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function inbox()
    {
        return $this->morphedByMany('App\Inbox', 'taggable');
    }
}
