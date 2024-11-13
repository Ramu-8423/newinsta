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


class WalletController extends Controller
{
    
   public function wallet(){
         $client_id = session('client_login_id');
         $perpage = 10;
        $wallet = DB::table('client_details')->where('id',$client_id)->value('wallet');
        $trs_history = DB::table('client_transaction')->where('client_id',$client_id)->orderBy('id','desc')->paginate($perpage);
        return view('wallet.index')->with('wallet',$wallet)->with('trs_history',$trs_history);
    }
    
    
}