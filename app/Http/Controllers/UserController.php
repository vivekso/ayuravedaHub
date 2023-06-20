<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Validator;
use Auth;

class UserController extends Controller
{
    public function index(){
        return view('admin.user_management.index');
    }
    public function addUser(){
        return view('admin.user_management.add');
    }
    public function add(Request $request){
        try {
            // echo"<pre>";
            // print_r($request->all());
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone_number'=>'required|unique:users',
                'address'=>'required'
            ]);
            // print_r($request->all());die;

            if ($validator->fails()){
                return redirect()->route('user_management');
            }
            // print_r("hje");die();
            $input = $request->all();   
            $user = User::create($input);
            return redirect()->route('user_management');
        }catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                "message"=>"Error",
                "error"=>"An unexpected error occurred while signup."                
            ],500);
        }
    }
}
