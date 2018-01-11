<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name', 'short_name', 'email', 'is_hide', 'address', 'coordinates',
    ];

    public function departments()
    {
        return $this->hasMany('App\Department');
    }
}
