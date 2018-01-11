<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    protected $fillable = [
        'name', 'number', 'date', 'folder', 'is_hide',
    ];
}
