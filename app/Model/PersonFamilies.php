<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonFamilies extends Model
{
    protected $table = 'people_families';
    protected $fillable=[
        'person_id','related_persion_id','related_person_citizenship','relationship_type'
    ];

    public function person(){
        return $this -> belongsTo('App\Model\Person','person_id');
    }
}
