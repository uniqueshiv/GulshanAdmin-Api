<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
   public function __construct(){
    // dd('ss');
     $this->middleware('auth:admin');
   }
   public function index(){
      $name=Auth::user()->name;
      if($name){
        return view('home');
      }

   }


}
