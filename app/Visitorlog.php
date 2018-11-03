<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitorlog extends Model
{
    protected $fillable = [
        'visitor_id', 'timein_at', 'timeout_at',
    ];
    
    protected $table = 'visitorlogs';
    public $timestamps = false;
}
