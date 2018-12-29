<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonFamilies extends Model
{
    //
    protected $fillable=[
        'person_id','related_persion_id','related_person_citizenship','relationship_type'
    ];
}
