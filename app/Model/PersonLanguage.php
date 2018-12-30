<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonLanguage extends Model
{
    protected $table = 'people_languages';
    protected $fillable=[
        'person_id','language','can_read','can_write'
    ];
}
