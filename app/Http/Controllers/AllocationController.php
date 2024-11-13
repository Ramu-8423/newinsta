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


class AllocationController extends Controller
{
      public function newallocation(){
             $client_id = session('client_login_id');
             $perpage = 10;
             $cases = DB::table('case_upload_count')->where('client_id',$client_id)->orderBy('id','desc')->paginate($perpage);
             return view('NewAllocation.index')->with('cases',$cases)->with('client_id',$client_id);
     }
    
    
}