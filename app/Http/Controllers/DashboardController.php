<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\ClientDetail;
use App\Models\User;


class DashboardController extends Controller
{
          public function dashboard(Request $request, string $id) {
            $client_id = session('client_login_id');
        
            // Store filter parameters in the session if the request method is POST
            if ($request->isMethod('post')) {
                $request->session()->put('id', $request->input('status_id'));
                $request->session()->put('candidate_name', $request->input('candidate_name'));
                $request->session()->put('email_id', $request->input('email_id'));
                $request->session()->put('mobile', $request->input('mobile'));
            }
        
            // Retrieve filter parameters from the session
            if (session('id')) {
                $id = session('id');
            }
            $candidate_name = session('candidate_name');
            $email_id = session('email_id');
            $mobile = session('mobile');
        
            // Initialize the query
            $query = DB::table('case_details')
                ->leftJoin('case_allocated', 'case_details.case_id', '=', 'case_allocated.case_id')
                ->select(
                    'case_details.case_id as case_id', 
                    'case_details.employee_id as employee_id', 
                    'case_details.location as location', 
                    'case_details.project_type as project_type', 
                    'case_details.pincode as pincode', 
                    'case_details.candidate_name as candidate_name', 
                    'case_details.mobile as mobile', 
                    'case_details.email as email', 
                    'case_details.father_name as father_name', 
                    'case_details.mother_name as mother_name', 
                    'case_details.address_type as address_type', 
                    'case_details.address as address', 
                    'case_details.city as city', 
                    'case_details.state as state', 
                    'case_details.period_of_stay_from as period_of_stay_from', 
                    'case_details.period_of_stay_to as period_of_stay_to', 
                    'case_details.contact_person_name as contact_person_name', 
                    'case_details.contact_person_desi as contact_person_desi', 
                    'case_details.site_vendor_name as site_vendor_name', 
                    'case_details.gst_number as gst_number', 
                    'case_details.pan_card_num as pan_card_num', 
                    'case_details.created_at as created_at', 
                    'case_details.approved_status as approved_status',
                    
                    'case_allocated.case_status as case_status', 
                    'case_allocated.case_closer_date as case_closer_date', 
                    'case_allocated.case_completed_date as case_completed_date', 
                    'case_allocated.end_date as end_date', 
                    );
        
            // Apply filters based on the status ID
            if ($id == 1) {
                $query->whereIn('case_details.approved_status', [0, 2]);
            } elseif (in_array($id, [2, 3, 4, 5,8,14])) {
                $query->where('case_allocated.case_status', $id);
            }
        
            // Apply additional filters if they are set
            if ($candidate_name) {
                $query->where('case_details.candidate_name', 'LIKE', '%' . $candidate_name . '%');
            }
        
            if ($email_id) {
                $query->where('case_details.email', 'LIKE', '%' . $email_id . '%');
            }
        
            if ($mobile) {
                $query->where('case_details.mobile', 'LIKE', '%' . $mobile . '%');
            }
        
            // Paginate the results
            $perPage = 10;
            $cases = $query->where('case_details.client_id', $client_id)
                           ->orderBy('case_details.case_id', 'desc')
                           ->paginate($perPage);
   
            // Return the view with the cases and status ID
            return view('index')->with('cases', $cases)->with('status_id', $id);
        }


    
    
    
    
    
    
}