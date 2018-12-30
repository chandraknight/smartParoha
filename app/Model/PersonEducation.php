<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonEducation extends Model
{
    protected $table = 'people_educations';
    protected $fillable=[
        'person_id','degree','board_university','year_of_start','year_of_completion','stream','college'
    ];
}
