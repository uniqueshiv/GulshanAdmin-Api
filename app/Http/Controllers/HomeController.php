<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class HomeController extends Controller
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

        if(!(Auth::guest()))
        {

          // $usr=DB::table('users')->get();
          // $rol=DB::table('roles')->get();
          //
          // $userRoles=DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')
          // ->join('roles', 'role_user.role_id', '=', 'roles.id')->select('users.*', 'roles.display_name', 'role_user.*')->get();
          //
          $usr=DB::table('admins')->get();
          $rol=DB::table('roles')->get();

          $userRoles=DB::table('admins')->join('role_user', 'admins.id', '=', 'role_user.user_id')
          ->join('roles', 'role_user.role_id', '=', 'roles.id')->select('admins.*', 'roles.display_name', 'role_user.*')->get();

          return view('Users.Admin.dashboard')->with('data',$rol)->with('usrdata',$usr)->with('usrrol',$userRoles);

         }
          else
          {

            return view('auth.login');
          }

      }

       public function profileup(Request $request, $id){

              if($request->hasFile('avatar')){
                  $avatar=$request->file('avatar');
                  $filename=time() . '.' . $avatar->getClientOriginalExtension();
                  Image::make($avatar)->resize(300,300)->save( public_path('/images/profile' . $filename));

                  $user=Auth::user();
                  $user->profileimg= $filename;
                  $user->save();
              }
               $usr=Auth::user();
               return view('Users.Client.dashboard', compact('usr'));

           }
  }
