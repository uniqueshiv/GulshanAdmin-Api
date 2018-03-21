<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Ramsey\Uuid\Uuid;

class PassportController extends Controller
{
  public $successStatus=200;

  public function login(Request $request){

  // if(Auth::attempt(['email'=>request('email'),'password'=>request('password')])){
      $username = $request->username;
      if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
          //user sent their email
          Auth::attempt(['email' => $username, 'password' => request('password')]);
      } else {
          //they sent their username instead
          Auth::attempt(['username' => $username, 'password' => request('password')]);
      }

      if ( Auth::check() ) {
         $user=Auth::user();
         $success['message']="Succesfully Login";
         $success['success']=true;
         $success['username']=$user->username;
         $success['email']=$user->email;
         $success['token']=$user->createToken('MyApp')->accessToken;
         return response()->json($success,$this->successStatus);
      }else{
         return response()->json(['error'=>'Unauthorized'],401);
      }


    //   $user=Auth::user();
    //   $success['token']=$user->createToken('MyApp')->accessToken;
    //   return response()->json(['success'=>$success],$this->successStatus);
    // }else{
    //   return response()->json(['error'=>'Unauthorized'],401);
    // }
  }
  public function register(Request $request){
    //dd($request->all());
    $validator=Validator($request->all(),[
      'username'=>'required|string|max:20|unique:users',
      'email'=>'required|email|max:255|unique:users',
      'password'=>'required',
      'c_password'=>'required|same:password',
     ]);
     if($validator->fails()){
       return response()->json(['error'=>$validator->errors()],401);
     }
     $input=$request->all();
     $uuid4 = Uuid::uuid4();
     $input['userid']=> $uuid4->toString(),
     $input['password']=bcrypt($input['password']);
     $user=User::create($input);
     $success['message']="Succesfully Register";
     $success['success']=true;
     $success['username']=$user->username;
     $success['email']=$user->email;
     $success['loginType']=$user->loginType;
      $success['token']=$user->createToken('MyApp')->accessToken;
     return response()->json($success,$this->successStatus);
   }

   public function getDetails(){
     $user=Auth::user();
     return response()->json(['success'=>$user],$this->successStatus);
   }

}
