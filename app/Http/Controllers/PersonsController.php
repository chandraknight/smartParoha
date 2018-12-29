<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonsController extends Controller
{
    //
    public function savePerson(Request $request){
//        dd($request);

      /*  $requestData = collect($request->only('names', 'emails', 'occupations'));

        $contacts = $requestData->transpose()->map(function ($contactData) {
            return new Contact([
                'name' => $contactData[0],
                'email' => $contactData[1],
                'occupation' => $contactData[2],
            ]);
        });*/

    }
}
