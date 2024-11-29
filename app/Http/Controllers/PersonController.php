<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function welcome(){
        $persons = Person::all();
        return view('welcome', compact('persons'));
    }

    public function store(Request $request){
        $filePath = public_path('storage/images');
        $file = $request ->file('image');
        $fileName = $request->name."-".$request->age."-".$file->getClientOriginalName();
        $file->move($filePath, $fileName);
        Person::create([
            'name' => $request->name,
            'age' => $request->age,
            'job' => $request->job,
            'gender_id' => $request->gender_id,
            'image'=>$fileName,
        ]);

        return redirect(route('welcome'));
    }

    public function createPerson(){
        $genders = Gender::all()->unique('gender');
        return view('createPerson',compact('genders'));
    }


    public function editPerson($id)
    {
        $person = Person::findOrFail($id);
        $genders = Gender::all()->unique('gender');
        return view('editPerson', compact('person','genders'));
    }


    public function updatePerson($id, Request $request){
        $person = Person::findOrFail($id);
        $filePath = public_path('storage/images');
        $file = $request ->file('image');
        $fileName = $request->name."-".$request->age."-".$file->getClientOriginalName();
        $file->move($filePath, $fileName);
        $person->update([
            'name' => $request->name,
            'age' => $request->age,
            'job' => $request->job,
            'gender_id' => $request->gender_id,
            'image'=>$fileName,
        ]);
        return redirect(route('welcome'));
    }

    public function deletePerson($id){
        Person::destroy($id);
        return redirect(route('welcome'));
    }
}
