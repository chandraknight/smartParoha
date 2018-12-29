<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $fillable=[
       'first_name','middle_name','last_name','DOB_np','DOB_en','gender','religion','nationality','caste','marital_status','email','contact','photo','user_id'
    ];
}
