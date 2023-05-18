<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Breed;
use App\Models\Patient;
use App\Models\Status;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::latest()->with('breed','status')->get();
        return response()->json([
            'message'=>'success',
            'data'=>$patients
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pet_name'=>'required|string',
            'owner_name'=>'required|string',
            'gender'=>'required|string',
            'phone_number'=>'required',
            'city'=>'required|string',
            'status_id'=>'required|string',
            'breed_id'=>'required|string',
            'date_of_birth'=>'required',
            'address'=>'required|string',
            'township'=>'required|string',
        ]);
        //  Throw if breed not found
         $breed_name = Breed::where('id',$request->breed_id)->first();
         if(!$breed_name){
            return response()->json([
                'message'=>'fail',
                'data'=>'Cannot Find Breeds!'
            ],404);
         }
        //  Throw if status not found
         $status = Status::where('id',$request->status_id)->first();
         if(!$status){
            return response()->json([
                'message'=>'fail',
                'data'=>'Cannot Find Status!'
            ],404);
         }
        Patient::create([
            'pet_id'=>mb_substr($breed_name->name,0,1).'-00'.rand(0,1000),
            'pet_name'=>$request->pet_name,
            'owner_name'=>$request->owner_name,
            'gender'=>$request->gender,
            'phone_number'=>$request->phone_number,
            'city'=>$request->city,
            'status_id'=>$request->status_id,
            'breed_id'=>$request->breed_id,
            'date_of_birth'=>$request->date_of_birth,
            'address'=>$request->address,
            'township'=>$request->township,
        ]);
        return response()->json([
            'message'=>'success',
            'data'=>'Created Successfully'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pet_name'=>'required|string',
            'owner_name'=>'required|string',
            'gender'=>'required|string',
            'phone_number'=>'required',
            'city'=>'required|string',
            'status_id'=>'required|string',
            'breed_id'=>'required|string',
            'date_of_birth'=>'required',
            'address'=>'required|string',
            'township'=>'required|string',
        ]);
        //Throw if  Patient not Found
        $patient = Patient::find($id);
        if(!$patient){
            return response()->json([
                'message'=>'fail',
                'data'=>'Patient Not Found'
            ],404);
        }
        //  Throw if breed not found
         $breed_name = Breed::where('id',$request->breed_id)->first();
         if(!$breed_name){
            return response()->json([
                'message'=>'fail',
                'data'=>'Cannot Find Breeds!'
            ],404);
         }
        //  Throw if status not found
         $status = Status::where('id',$request->status_id)->first();
         if(!$status){
            return response()->json([
                'message'=>'fail',
                'data'=>'Cannot Find Status!'
            ],404);
         }
        $patient->update([
            'pet_name'=>$request->pet_name,
            'owner_name'=>$request->owner_name,
            'gender'=>$request->gender,
            'phone_number'=>$request->phone_number,
            'city'=>$request->city,
            'status_id'=>$request->status_id,
            'breed_id'=>$request->breed_id,
            'date_of_birth'=>$request->date_of_birth,
            'address'=>$request->address,
            'township'=>$request->township,
        ]);
        return response()->json([
            'message'=>'success',
            'data'=>'Updated Successfully'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        //Throw if  Patient not Found
        if(!$patient){
            return response()->json([
                'message'=>'fail',
                'data'=>'Patient Not Found'
            ],404);
        }
        $patient->delete();
        return response()->json([
            'message'=>'success',
            'data'=>'Patient Deleted Success'
        ],200);
    }
}
