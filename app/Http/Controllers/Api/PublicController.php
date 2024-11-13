<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PublicController extends Controller
{
         public function verify_credential(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'referenceId' => 'required',
            'password'=>'required'
        ]);
		   
        $validator->stopOnFirstFailure();

        if ($validator->fails()) {
            return response()->json(['status'=>400,'message'=> $validator->errors()->first()]);
        }
        
        
        $referenceId = $request->referenceId;
        $password = $request->password;
         $data = DB::table('users')->where('reference_id',$referenceId)->where('password',$password)->first('mobile');
         $mobile = $data->mobile;
         
         if($data){
             return response()->json(['status'=>200,'message'=>'In test mode running without validation!','mobile'=>$mobile]);
         }else{
             return response()->json(['status'=>400,'message'=>'In test mode running without validation!']);
         }
    
    }
    
          public function get_mobile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'referenceId' => 'required'
        ]);
		   
        $validator->stopOnFirstFailure();

        if ($validator->fails()) {
            return response()->json(['status'=>400,'message'=> $validator->errors()->first()]);
        }
        
         $referenceId = $request->referenceId;
         
         $data = DB::table('users')->where('reference_id',$referenceId)->first('mobile');
         $mobile = $data->mobile;     
    
    if($data){
        return response()->json(['status'=>200,'message'=>'Mobile number for verify otp','mobile'=>$mobile]);    
    }else{
        return response()->json(['status'=>400,'message'=>'Mobile number for verify otp']); 
    }
    
    }
    
}