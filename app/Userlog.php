<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlog extends Model
{
    protected $fillable = [
        'user_id', 'login_at', 'logout_at',
    ];
    
    protected $table = 'userlogs';
    public $timestamps = false;
}
