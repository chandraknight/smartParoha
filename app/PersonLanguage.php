<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonLanguage extends Model
{
    //
    protected $fillable=[
        'person_id','language','can_read','can_write'
    ];
}
