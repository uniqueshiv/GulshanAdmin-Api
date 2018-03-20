<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      return view('auth.register');
    }

    public function test()
    {
      return view('client');
    }


    public function sett()
    {
       $usr=Auth::user();

      return view('Users.Client.customer', compact('usr'));

    }



    public function form()
    {
      if(!(Auth::guest()))
      {

        $usr=DB::table('users')->get();
        $rol=DB::table('roles')->get();

        $userRoles=DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')->select('users.*', 'roles.display_name', 'role_user.*')->get();


        return view('Users.Admin.dashboard')->with('data',$rol)->with('usrdata',$usr)->with('usrrol',$userRoles);
       }
        else
        {

          return view('auth.login');
        }
    }





 public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        else {
            $this->create($request->all());
        }

           return response()
            ->json([
                'created' => true
            ]);

    }

       protected function validator(array $data)
    {
        return Validator::make($data, [

            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'address'=>'required|max:255',
            'cin'=>'required|max:255',
            'gst'=>'required|max:255',
            'mobile'=>'required|min:6|numeric',
            'commissionerate'=>'required',
            'pannumber'=>'max:200',
            'password' => 'required|min:6',
            'beneficiaryswift'=>'max:200',
            'beneficiarynum'=>'required|numeric',
            'beneficiary_name'=>'required|max:220',
            'beneficiaryifsc'=>'required|max:10',
            'bankname'=>'required|max:200',
        ]);
    }

  protected function create(array $data)
    {
        $uuid4 = Uuid::uuid4();
        $user= User::create([
            'userid'=> $uuid4->toString(),
            'name' => $data['name'],
            'email' => $data['email'],
            'address'=>$data['address'],
            'cin'=>$data['cin'],
            'gst'=>$data['gst'],
            'mobile'=>$data['mobile'],
            'pannumber'=>$data['pannumber'],
            'commissionerate'=>$data['commissionerate'],
            'beneficiaryswift' =>$data['beneficiaryswift'],
            'beneficiarynum' =>$data['beneficiarynum'],
            'beneficiary_name' =>$data['beneficiary_name'],
            'beneficiaryifsc' =>strtoupper($data['beneficiaryifsc']),
            'bankname' => $data['bankname'],
            'password' => bcrypt($data['password']),
        ]);

     return $user;
    }

    public function notifications(){
      return view('notifications.create');
    }



}
