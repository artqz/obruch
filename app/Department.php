<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'organization_id', 'is_hide',
    ];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
}
