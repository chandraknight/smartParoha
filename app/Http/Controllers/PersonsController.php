<?php

namespace App\Http\Controllers;

use App\Model\Person;
use App\Model\PersonAddress;
use App\Model\PersonEducation;
use App\Model\PersonFamilies;
use App\Model\PersonLanguage;
use App\Model\PersonId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonsController extends Controller
{

    public function savePerson(Request $request){
//     dd($request);
     $person = new Person();
     $person->first_name = $request->first_name;
     $person->middle_name = $request->middle_name;
     $person->last_name = $request->last_name;
     $person->DOB_en = $request->DOB_en;
     $person->gender = $request->gender;
     $person->religion = $request->religion;
     $person->nationality = $request->nationality;
     $person->caste = $request->caste;
     $person->marital_status = $request->marital;
     $person->email = $request->email;
//     $person->user_id = Auth::user()->id;

    if(isset($request->photo)){
        $filenamewithext = $request->file('photo')->getClientOriginalName();
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filename = pathinfo($filenamewithext,PATHINFO_FILENAME);
        $storename = $filename.time().'.'.$extension;
        $path = $request->file('photo')->storeAs('/personphoto/',$storename);
        $person->photo = $storename;
    }
//    dd($person);
    if($person->save()){
        $requestData = collect($request->only(
            'country','state','district','municipality','ward','village','tole','house','type'
        ));

        $address = $requestData->transpose()->map(function ($addressData) {
            return new PersonAddress([
                'country' => $addressData[0],
                'state' => $addressData[1],
                'district' => $addressData[2],
                'muncipality'=>$addressData[3],
                'ward'=>$addressData[4],
                'village'=>$addressData[5],
                'tole'=>$addressData[6],
                'house'=>$addressData[7],
                'type'=>$addressData[8],
            ]);
        });

        $person->addressDetails()->saveMany($address);

        $requestData = collect($request->only(
            'personname','relatedid','relationship_type'
        ));
        $family = $requestData->transpose()->map(function($familyData){
            return new PersonFamilies([
                'related_person_id'=>$familyData[0],
                'related_person_citizenship'=>$familyData[1],
                'relationship_type'=>$familyData[2],
            ]);
        });

        $person->familyDetails()->saveMany($family);
        $requestData = collect($request->only(
            'degree','university','year_of_start','year_of_completion','stream','college'
        ));
        $education = $requestData->transpose()->map(function($educationData){
//            dd($educationData);
            return new PersonEducation([
                'degree'=>$educationData[0],
                'board_university'=>$educationData[1],
                'year_of_start'=>$educationData[2],
                'year_of_completion'=>$educationData[3],
                'stream'=>$educationData[4],
                'college'=>$educationData[5],
            ]);
        });

        $person->educationDetails()->saveMany($education);
        $requestData = collect($request->only(
            'language','can_read','can_write'
        ));
        $language = $requestData->transpose()->map(function($languageData){
            return new PersonLanguage([
                'language'=>$languageData[0],
                'can_read'=>$languageData[1],
                'can_write'=>$languageData[2]
            ]);
        });
        $person->languageDetails()->saveMany($language);

        $requestData = collect($request->only(
            'idnumber','idtype'
        ));
        $ids = $requestData->transpose()->map(function($idData){
            return new PersonId([
                'id_no'=>$idData[0],
                'id_type'=>$idData[1]
            ]);
        });
        $person->identityDetails()->saveMany($ids);

        return redirect()->route('add-person')->with('success','Person Added Successfully');
    }



    }
}
