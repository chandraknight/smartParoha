<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonAddress extends Model
{
    //
    protected $fillable=[
        'person_id','country','state','district','muncipality','ward','village','tole','house','address_type'
    ];
}
