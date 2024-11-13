<?php
namespace App\Http\Controllers\Auth;
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
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    
    
    
    public function all_details()
    {
        $details = DB::table('client_details')->get();
        
        if($details->isNotEmpty()){
            return response()->json(['status'=> 200, 'message'=> 'sucess','data'=>$details]);
        }else{
            return response()->json(['status'=> 400, 'message' => 'NO Record']);
        }
    }
    
    public function total_details(? string $id)
    {
        
        $details = DB::table('client_details')->where('id',$id)->first();
        if($details){
            return response()->json(['status'=> 200, 'message' => 'sucess', 'data' =>$details]);
        }
        else{
            return response()->json(['status' => 401, 'message' => 'No Record']);
        }
    }
    
    public function login(Request $request)
    {
                 $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            $user = User::where('email', $request->email)->first();

                            if (! $user || ! Hash::check($request->password, $user->password)) {
                    throw ValidationException::withMessages([
                        'email' => ['The provided credentials are incorrect.'],
                    ]);
                }

                      $token = $user->createToken('auth_token')->plainTextToken;
            
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);

    }
    
    // public function logout(Request $request)
    // {
    //     $request->user()->currentAccessToken()->delete();
        
    //     return response()->json([
    //         'message'=> 'Logged Out Successfully'
    //         ]);
    // }
    
    
}
