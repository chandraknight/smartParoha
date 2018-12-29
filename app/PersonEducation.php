<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonEducation extends Model
{
    //
    protected $fillable=[
        'person_id','degree','board_university','year_of_start','year_of_completion','stream','college'
    ];
}
