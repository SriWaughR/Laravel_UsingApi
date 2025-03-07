<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\basic;
use Validator;
use App\Http\Resources\basic as BasicResource;
use App\Http\Resources\basicCollection;

class BasicController extends Controller
{
    public function user(Request $request,$id){
        $basic = basic::find($id);
        return new BasicResource($basic);
    }

    public function users(){
        $basics = basic::all();
        return new basicCollection($basics);
    }

    public function index(){
        $basic = basic::all();
        $data =[
            "status" => 200,
            "basic" => $basic
        ];
        return response()->json($data,200);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric'
        ]);

        if($validate->fails()){
            $data=[
                'status'=>422,
                'message'=>$validate->messages()
            ];

            return response()->json($data,422);
        }
        else{
            $data=[
                'status'=>200,
                'message'=>'The Details Uploaded Successfully'
            ];
            $basic = new basic;
            $basic->name = $request->name;
            $basic->email = $request->email;
            $basic->phone = $request->phone;
            $basic->save();

            return response()->json($data,200);
        }
    }

    public function edit(Request $request,$id){
        $validate = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric'
        ]);

        if($validate->fails()){
            $data=[
                'status'=>422,
                'message'=>$validate->messages()
            ];

            return response()->json($data,422);
        }
        else{
            $data=[
                'status'=>200,
                'message'=>'The Details Updated Successfully'
            ];
            $basic = basic::find($id);
            $basic->name = $request->name;
            $basic->email = $request->email;
            $basic->phone = $request->phone;
            $basic->save();

            return response()->json($data,200);
        }
    }

    public function delete($id){
        $basic = basic::find($id);
        $basic -> delete();

        $data = [
            'status' => 200,
            'message' => 'This Details Deleted Successfully'
        ];

        return response()->json($data,200);
    }
}
