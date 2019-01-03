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
use Illuminate\Support\Facades\Storage;

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
     $person->contact = $request->contact;
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
                'address_type'=>$addressData[8],
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

    public function editPerson($id){
        $person = Person::findorfail($id);

        return view('editperson',['person'=>$person]);
    }

    public function updatePerson(Request $request){
//        dd($request);
        $person = Person::findorfail($request->id);
        if(isset($request->photo)){
            Storage::disk('public')->delete('/personphoto/'.$person->photo);
            $filenamewithext = $request->file('photo')->getClientOriginalName();
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filename = pathinfo($filenamewithext,PATHINFO_FILENAME);
            $storename = $filename.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('/personphoto/',$storename);
            $person->update([
                'photo'=>$storename
            ]);
        }
        $person->update([
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'gender'=>$request->gender,
            'religion'=>$request->religion,
            'nationality'=>$request->nationality,
            'caste'=>$request->caste,
            'contact'=>$request->contact,
            'DOB_en'=>$request->DOB_en,
            'DOB_np'=>$request->DOB_en,
            'marital_status'=>$request->marital,
            'email'=>$request->email
        ]);
        $requestData = collect($request->only(
            'identityid','idnumber','idtype'
        ));

        $identities = $requestData->transpose()->map(function($identityData){
            if($identityData[0] != null){
                $identity = PersonId::findorfail($identityData[0]);
                $identity->update([
                    'id_no'=>$identityData[1],
                    'id_type'=>$identityData[2]
                ]);
            } else {
                return new PersonId([
                    'id_no'=>$identityData[1],
                    'id_type'=>$identityData[2]
                ]);
            }
        });
//        dd($identities->first());
        if($identities->first() != null ){
            $person->identityDetails()->saveMany($identities);
        }

        $requestData = collect($request->only(
            'addressid','country','state','district','municipality','ward','village','tole','house','type'
        ));
        $addresses = $requestData->transpose()->map(function($addressData){
            if($addressData[0] != null){
                $address = PersonAddress::findorfail($addressData[0]);
                $address->update([
                    'country'=>$addressData[1],
                    'state'=>$addressData[2],
                    'district'=>$addressData[3],
                    'muncipality'=>$addressData[4],
                    'ward'=>$addressData[5],
                    'village'=>$addressData[6],
                    'tole'=>$addressData[7],
                    'house'=>$addressData[8],
                    'address_type'=>$addressData[9]
                ]);
            }
        });

        $requestData = collect($request->only(
            'familyid','personname','relatedid','relationship_type'
        ));
        $families = $requestData->transpose()->map(function($familyData){
            if($familyData[0] != null){
                $family = PersonFamilies::findorfail($familyData[0]);
                $family->update([
                    'related_person_id'=>$familyData[1],
                    'relatedid'=>$familyData[2],
                    'relationship_type'=>$familyData[3]
                ]);
            } else {
                return new PersonFamilies([
                    'related_person_id'=>$familyData[1],
                    'relatedid'=>$familyData[2],
                    'relationship_type'=>$familyData[3]
                ]);
            }
        });
        if($families->first() != null){
            $person->familyDetails()->saveMany($families);
        }


        $requestData = collect($request->only(
            'educationid','degree','university','year_of_start','year_of_completion','stream','college'
        ));

        $educations = $requestData->transpose()->map(function($educationData){
            if($educationData[0] != null){
                $education = PersonEducation::findorfail($educationData[0]);
                $education->update([
                    'degree'=>$educationData[1],
                    'board_university'=>$educationData[2],
                    'year_of_start'=>$educationData[3],
                    'year_of_completion'=>$educationData[4],
                    'stream'=>$educationData[5],
                    'college'=>$educationData[6]
                ]);
            } else {
                return new PersonEducation([
                    'degree'=>$educationData[1],
                    'board_university'=>$educationData[2],
                    'year_of_start'=>$educationData[3],
                    'year_of_completion'=>$educationData[4],
                    'stream'=>$educationData[5],
                    'college'=>$educationData[6]
                ]);
            }
        });
        if($educations->first() != null){
            $person->educationDetails()->saveMany($educations);
        }


        $requestData = collect($request->only(
            'languageid','language','can_read','can_write'
        ));
        $languages = $requestData->transpose()->map(function($languageData){
            if($languageData[0] != null){
                $language = PersonLanguage::findorfail($languageData[0]);
                $language->update([
                    'language'=>$languageData[1],
                    'can_read'=>$languageData[2],
                    'can_write'=>$languageData[3]
                ]);
            } else {
                return new PersonLanguage([
                    'language'=>$languageData[1],
                    'can_read'=>$languageData[2],
                    'can_write'=>$languageData[3],
                ]);
            }

        });
        if($languages->first() != null){
            $person->languageDetails()->saveMany($languages);
        }

        return redirect()->route('list-person')->with('success','Person Updated Successfully');

    }

    public function deletePerson($id){
        $person = Person::findorfail($id);
        if($person->photo != null){
            Storage::disk('public')->delete('/personphoto/'.$person->photo);
        }
        $person->delete();
        return redirect()->route('list-person')->with('success','Person Deleted Successfully');
    }

    public function viewPerson($id){
        $person = Person::findorfail($id);
        return view('view-person',['person'=>$person]);
    }
}
