<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonFamilies extends Model
{
    protected $table = 'people_families';
    protected $fillable=[
        'person_id','related_person_name','related_person_citizenship','relationship_type','issued_date','issued_by'
    ];

    public function person(){
        return $this -> belongsTo('App\Model\Person','person_id');
    }
}
