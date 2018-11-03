<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'picture', 'lastname', 'firstname', 'middlename', 'address', 'contact_number', 'id_type', 'govid_number',
        'destination',  'purpose', 'accesscard_number', 'person-in-charge', 'members',
    ];

    protected $table = 'visitors';
}
