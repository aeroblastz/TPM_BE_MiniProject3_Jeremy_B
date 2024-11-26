<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Gender;
class PersonController extends Controller
{
    public function welcome(){
        $persons = Person::all();
        return view('welcome', compact('persons'));
    }

    public function store(Request $request){

        Person::create([
            'name' => $request->name,
            'age' => $request->age,
            'job' => $request->job,
            'gender_id' => $request->gender_id,
        ]);

        return redirect(route('welcome'));
    }

    public function createPerson(){
        $genders = Gender::all();
        return view('createPerson',compact('genders'));
    }
}
