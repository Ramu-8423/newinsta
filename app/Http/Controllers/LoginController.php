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


class LoginController extends Controller
{
    
  
    public function reset_filters_users(Request $request) {
		$request->session()->forget('candidate_name');
		$request->session()->forget('email_id');
		$request->session()->forget('mobile');
		$request->session()->forget('id');
		return redirect()->back();
	}

    // validation end

    public function showLoginForm()
    {
        return view('admin.login');
    }
    
    public function login1(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required',
            'password' => 'required',
        ]);

        $mobile_number = $request->mobile_number;
        $password = $request->password;

        
        $user = DB::table('admins')->where('mobile_number',$mobile_number)->where('password',$password)->first();
       //dd($user);
       return redirect()->route('dashboard')->with('success', 'User status updated successfully!');
    }

public function rechargeAccount(Request $request)
{
    
    $clientId = session('client_id'); 

    if (!$clientId) {
        return redirect()->back()->with('error', 'Client not found');
    }


    $request->validate([
        'amount' => 'required|numeric|min:1'
    ]);


    $client = DB::table('client_details')->where('id', $clientId)->first();
    
    if (!$client) {
        return redirect()->back()->with('error', 'Client details not found');
    }

    
    $newBalance = $client->wallet + $request->input('amount');

    
    DB::table('client_details')->where('id', $clientId)->update(['wallet' => $newBalance]);


    DB::table('transactions')->insert([
        'client_id' => $clientId,
        'amount' => $request->input('amount'),
        'type' => 'credit',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    
    return redirect()->back()->with('success', 'Account recharged successfully. New Balance: ₹' . $newBalance);
}


public function showBalancePage()
{
    $clientId = session('client_id'); 
    $balance = DB::table('client_details')->where('id', $clientId)->value('wallet');
    $transactions = DB::table('transactions')->where('client_id', $clientId)->get();

    return view('vendor.wallet', compact('balance', 'transactions'));
}


public function filterData(Request $request)
{
    $projectType = $request->input('project_type');
    
    // Fetch data based on project type
    $data = DB::table('case_details')
              ->when($projectType, function ($query, $projectType) {
                  return $query->where('project_type_column', $projectType);
              })
              ->select('case_id', 'client_id', 'employee_id','location','project_type' ,'approved_status','case_status') // Specify the columns you want to display
              ->get();

    return view('vendor.vendor', ['data' => $data]);
}


    
    public function clientreports(Request $request,string $id){
    
          if ($request->isMethod('post')) {
			$request->session()->put('candidate_name', $request->input('candidate_name'));
			$request->session()->put('email_id', $request->input('email_id'));
			$request->session()->put('mobile', $request->input('mobile'));
		}
       
       	$candidate_name = session('candidate_name');
		$email_id = session('email_id');
		$mobile = session('mobile');
        
        $query = DB::table('case_details')->where('approved_status', $id); 

	   if ($candidate_name) {
        $query->where('candidate_name', 'LIKE', '%' . $candidate_name . '%');
       }

	   if ($email_id) {
        $query->where('email', 'LIKE', '%' . $email_id . '%');
       }

		if ($mobile) {
			 $query->where('mobile', 'LIKE', '%' . $mobile . '%');
		}
       
        $perPage = 10;
		$cases = $query->orderBy('id', 'desc')->paginate($perPage);
        return view('vendor.client')->with('cases',$cases)->with('status_id',$id);
    }
    
    public function resetFilters(Request $request)
{
    // Clear session filters
    $request->session()->forget(['candidate_name', 'email_id', 'mobile', 'project']);
    
    // Redirect back to the new allocation page without filters
    return redirect()->route('newallocation', ['status_id' => 101,'project'=>1]);
}

    
    public function reset_filters_approved_case(Request $request) {
		$request->session()->forget('candidate_name');
		$request->session()->forget('email_id');
		$request->session()->forget('mobile');
		return redirect()->back();
	}
    
    
    public function transaction_history(? string $id)
    {
        $cases =DB::table('client_transaction')->where('status', $id)->get();
        return view('Transaction.transactionhistory', compact('cases'));
    }


    public function add_user()
    {
        $cases = DB::table('case_details')->get();
        return view('vendor.totalpaying', compact('cases'));
    }
   

    
    public function myprofile_section1()
    {
        return view('myprofile.profile1');
    }

    //all cases open 

     public function allCases()
    {
        $cases = DB::table('case_details')->get();
        return view('cases.all', compact('cases'));
    }

    public function pendingCases()
    {
        $cases = DB::table('case_details')->where('case_status', 'Pending')->get();
        return view('cases.pending', compact('cases'));
    }

    public function insuffCases()
    {
        $cases = DB::table('case_details')->where('case_status', 'Insuff')->get();
        return view('cases.insuff', compact('cases'));
    }
    
    Public function holdCases()
    {
        $cases = DB::table('case_details')->where('case_status', 'Hold')->get();
        return view('cases.hold', compact('cases'));
    }
    
    public function rejectedCases()
    {
        $cases = DB::table('case_details')->where('case_status', 'Rejected')->get();
        return view('cases.rejected', compact('cases'));
    }
    
    public function reopenCases()
    {
        $cases = DB::table('case_details')->where('case_status', 'Reopen')->get();
        return view('cases.reopen', compact('cases'));
    }
    
    public function uploadFile(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:.xls,.csv,.xlsx|max:2048', // Adjust the file types and size as needed
    ]);

    if ($request->file('file')) {
        $filePath = $request->file('file')->store('uploads', 'public');
        return back()->with('success', 'File uploaded successfully!');
    }

    return back()->with('error', 'Please select a valid file to upload.');
}

    
} 
   
   
    





           
           

    

