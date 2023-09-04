<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        if($people->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'people' => $people  
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'people' => 'No Records Found'  
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:15',
            'Surname' => 'required|string|max:15',
            'Phone_Number' => 'required|digits:9',
            'Email_Adress' => 'required|string|max:30',
            'Country' => 'required|string|max:30',
            'City' => 'required|string|max:30',
            'Street' => 'required|string|max:50',
            'Apartment_Number' => 'required|numeric'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else
        {
            $person = Person::create([
                'Name' => $request->Name,
                'Surname' => $request->Surname,
                'Phone_Number' => $request->Phone_Number,
                'Email_Adress' => $request->Email_Adress,
                'Country' => $request->Country,
                'City' => $request->City,
                'Street' => $request->Street,
                'Apartment_Number' => $request->Apartment_Number,
            ]);

            if($person){

                return response()->json([
                    'status' =>200,
                    'message' => "Person Created Succesfully"
                ],200);
            }
            else
            {
                return response()->json([
                    'status' =>500,
                    'message' => "Something Went Wrong"
                ],500);
            }

        }
    }

    public function show($id)
    {
       $person = Person::find($id);
       if ($person) 
       {
        return response()->json([
            'status' => 200,
            'person' => $person
        ], 200);
       }
       else
       {
        return response()->json([
            'status' => 404,
            'message' => "No Such Person Found"
        ], 404);
       }
    }

    public function edit($id)
    {
        $person = Person::find($id);
        if ($person) 
        {
         return response()->json([
             'status' => 200,
             'person' => $person
         ], 200);
        }
        else
        {
         return response()->json([
             'status' => 404,
             'message' => "No Such Person Found"
         ], 404);
        } 
    }

    public function update(request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:15',
            'Surname' => 'required|string|max:15',
            'Phone_Number' => 'required|digits:9',
            'Email_Adress' => 'required|string|max:30',
            'Country' => 'required|string|max:30',
            'City' => 'required|string|max:30',
            'Street' => 'required|string|max:50',
            'Apartment_Number' => 'required|numeric'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else
        {   
            $person = Person::find($id);
            if($person)
            {
            $person -> update([
                'Name' => $request->Name,
                'Surname' => $request->Surname,
                'Phone_Number' => $request->Phone_Number,
                'Email_Adress' => $request->Email_Adress,
                'Country' => $request->Country,
                'City' => $request->City,
                'Street' => $request->Street,
                'Apartment_Number' => $request->Apartment_Number,
            ]);

                return response()->json([
                    'status' =>200,
                    'message' => "Person Updated Succesfully"
                ],200);
            }
            else
            {
                return response()->json([
                    'status' =>404,
                    'message' => "No Such Person Found"
                ],404);
            }

        }
    }

    public function destroy($id)
    {
        $person = Person::find($id);
        if($person)
        {
            $person->delete();
            return response()->json([
                'status' =>200,
                'message' => "Person Deleted Succesfully"
            ],200);
        }
        else
        {
            return response()->json([
                'status' =>404,
                'message' => "No Such Person Found"
            ],404);
        }
    

    }
}
