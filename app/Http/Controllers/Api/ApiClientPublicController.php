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
use Session;
                    

class ApiClientPublicController extends Controller
{
    public function verify_client_credentials(Request $request){
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
         $data = DB::table('client_details')->where('reference_id',$referenceId)->first();
        
       // if (!($login && Hash::check($request->password, $login->password))) {
         if($data && Hash::check($request->password,$data->password)){
              $mobile = $data->phone_number;
             return response()->json(['status'=>200,'message'=>'In test mode running without validation!','mobile'=>$mobile]);
         }else{
             return response()->json(['status'=>400,'message'=>'In test mode running without validation!']);
         }   
    }
    
           public function get_client_mobile(Request $request) {
                $validator = Validator::make($request->all(), [
                    'referenceId' => 'required'
                ]);
            
                if ($validator->fails()) {
                    return response()->json(['status' => 400, 'message' => $validator->errors()->first()]);
                }
            
                $referenceId = $request->input('referenceId');
                $data = DB::table('client_details')->where('reference_id', $referenceId)->first();
            
                if ($data) {
                    $mobile = $data->phone_number;
                    $id = $data->id;
                    $login_name = $data->person_name;
                    $login_email = $data->email;
                    $login_company = $data->company_name;
                    $login_client_pay_type = $data->payment_preference;
                    // Set the session data
                    
                    $request->session()->put('client_login_id', $id);
                    $request->session()->put('client_login_name', $login_name);
                    $request->session()->put('client_login_email', $login_email);
                    $request->session()->put('client_login_company', $login_company);
                    $request->session()->put('login_client_pay_type', $login_client_pay_type);
                    $request->session()->put('session_client_details',$data);
                    Session::put('progress_status',$data->progress_status);
                    $request->session()->put('progress_status',$data->progress_status);
                    $request->session()->put('remark_status',$data->remark_status);
                    
                   
                    
                    
                    // $request->session()->save(); // Save the session explicitly
                    
                return response()->json([
                    'status' => 200, 
                    'message' => 'Mobile number for verify otp',
                    'mobile' => $mobile,
                    'progress_status'=>$data->progress_status,
                    'remark_status'=>$data->remark_status
                    ]);
                } else {
                    return response()->json(['status' => 400, 'message' => 'Mobile number not found for verify otp']);
                }
            }


   public function client_agreement(Request $request){
           $id = $request->id;
         $company_name = $request->company_name;
         $cin_number = $request->cin_number;
         $company_address = $request->company_address;
         $signatory_name = $request->signatory_name;
         $a_signatory_desi = $request->signatory_designation;
         $case_timeline = $request->case_timeline;
         $person_name = $request->person_name;
         $person_phone = $request->person_phone;
         $person_email = $request->person_email;
         $person_designation = $request->person_designation;
         $pan_card = $request->file('pan_card');
         $gst = $request->file('gst');
         $quotation_doc = $request->file('quotation_doc');
         $remark_status = $request->remark_status;
         if($remark_status==1){
             $remark_status = 0;
         }
         
         
         $a_other_person_info = [
             [
             "person_name"=>$person_name[0],
             "person_phone"=>$person_phone[0],
             "person_email"=>$person_email[0],
             "person_designation"=>$person_designation[0],
             ],
             [
             "person_name"=>$person_name[1],
             "person_phone"=>$person_phone[1],
             "person_email"=>$person_email[1],
             "person_designation"=>$person_designation[1],
             ],
             [
             "person_name"=>$person_name[2],
             "person_phone"=>$person_phone[2],
             "person_email"=>$person_email[2],
             "person_designation"=>$person_designation[2],
             ]
             ];
             
                    if ($request->hasFile('pan_card')) {
                        $pan_card = $request->file('pan_card');
                    }else{
                       $pan_card = null; 
                    }
                    
                    if ($request->hasFile('gst')) {
                        $gst = $request->file('gst');
                    }else{
                       $gst = null; 
                    }
                    if ($request->hasFile('quotation_doc')) {
                        $quotation_doc = $request->file('quotation_doc');
                    }else{
                       $quotation_doc = null; 
                    }
                    
                     $filePaths = [];
                    $allowedFileTypes = ['pdf', 'jpg', 'jpeg', 'png'];
                  if ($pan_card) {
                        $rand = Str::random(8);
                        $extension = $pan_card->getClientOriginalExtension();
                        $fileName = $rand . '.' . $extension;
                        $filePath = 'agreement_doc/' . $fileName;
                        if (!in_array(strtolower($extension), $allowedFileTypes)) {
                             return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'Please select valid file!');
                        }
                        try {
                            $fileContents = file_get_contents($pan_card->getPathname());
                            if ($fileContents === false) {
                                return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'Failed to read PAN Card file contents.');
                            }
                            $fullPath = public_path($filePath);
                            $saved = file_put_contents($fullPath, $fileContents);
                            if ($saved === false) {
                               return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'Failed to save the PAN Card file.');
                            }
                            $filePaths['a_pan_card'] = $filePath;
                                DB::table('client_details')->where('id', $id)->update(['a_pan_card'=>$filePath]);
                        } catch (\Exception $e) {
                             return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'An error occurred while uploading PAN Card');
                        }
                     }
                    // Process GST file
                              if ($gst) {
                                    $rand = Str::random(8);
                                    $extension = $gst->getClientOriginalExtension();
                                    $fileName = $rand . '.' . $extension;
                                    $filePath = 'agreement_doc/' . $fileName;
                                    if (!in_array(strtolower($extension), $allowedFileTypes)) {
                                return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'Invalid GST file type. Only PDF, JPG, JPEG, and PNG are allowed.');
                                    }
                                try {
                                    $fileContents = file_get_contents($gst->getPathname());
                                    if ($fileContents === false) {
                   return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'Failed to read GST file contents.');
                                    }
                            
                                    $fullPath = public_path($filePath);
                                    $saved = file_put_contents($fullPath, $fileContents);
                                    if ($saved === false) {
                                         return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'Failed to save the GST file.');
                                    }
                                    $filePaths['a_gst'] = $filePath;
                                    DB::table('client_details')->where('id', $id)->update(['a_gst'=>$filePath]);
                                } catch (\Exception $e) {
                return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'An error occurred while uploading GST');
                                }
                         }
                             if ($quotation_doc) {
                                $rand = Str::random(8);
                                $extension = $quotation_doc->getClientOriginalExtension();
                                $fileName = $rand . '.' . $extension;
                                $filePath = 'agreement_doc/' . $fileName;
                                if (!in_array(strtolower($extension), $allowedFileTypes)) {
            return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'Invalid Quotation Document file type. Only PDF, JPG, JPEG, and PNG are allowed.');
                                }
                            try {
                                $fileContents = file_get_contents($quotation_doc->getPathname());
                                if ($fileContents === false) {
                 return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'Failed to save the Quotation Document file.');
                                }
                                $fullPath = public_path($filePath);
                                $saved = file_put_contents($fullPath, $fileContents);
                                if ($saved === false) {
             return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'Failed to read Quotation Document file contents.');
                                }
                                $filePaths['a_quotation_doc'] = $filePath;
                                DB::table('client_details')->where('id', $id)->update(['a_quotation_doc'=>$filePath]);
                            } catch (\Exception $e) {
             return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('error', 'An error occurred while uploading Quotation Document');
                            }
                         }
      $update = DB::table('client_details')->where('id',$id)->update([
          'progress_status'=>2,
          'a_company_name'=>$company_name,
          'a_cin_number'=>$cin_number,
          'a_company_address'=>$company_address,
          'a_signatory_name'=>$signatory_name,
          'a_signatory_desi'=>$a_signatory_desi,
          'a_case_timeline'=>$case_timeline,
          'a_other_person_info'=>$a_other_person_info,
          'remark_status'=>$remark_status
          ]);
     if($update){
       return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('success', 'Updated successfully');
     }else{
          return redirect()->away(env('APP_ADMIN_URL').'client_onboarding/'.$id)->with('success', 'Failed  to update!');
     }
    
   }

    
    
    
    
    
    
    
    
}