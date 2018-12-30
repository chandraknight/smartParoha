<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'DOB_np',
        'DOB_en',
        'gender',
        'religion',
        'nationality',
        'caste',
        'marital_status',
        'email',
        'contact',
        'photo',
        'user_id'
    ];

    public function addressDetails(){
        return $this -> hasMany('App\Model\PersonAddress');
    }
    public function familyDetails(){
        return $this -> hasMany('App\Model\PersonFamilies');
    }
    public function educationDetails(){
        return $this -> hasMany('App\Model\PersonEducation');
    }
    public function languageDetails(){
        return $this -> hasMany('App\Model\PersonLanguage');
    }

    public function identityDetails(){
        return $this -> hasMany('App\Model\PersonId');
    }
}
