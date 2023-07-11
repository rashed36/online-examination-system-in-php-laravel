<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oex_students;
class StudentController extends Controller
{
    public function signup()
    {
    	return view('student.signup');
    }
    public function login_sub(Request $request)
    {
    	$resp=Oex_students::where('email',$request->email)->where('password',$request->password)->get()->first();
    	if($resp)
    	{
    		$request->session()->put('id',$resp->id);
    		$arr=array('status'=>'true','message'=>'success','reload'=>url('student/dashboard'));
    	}
    	else 
    	{
    		$arr=array('status'=>'false','message'=>'Email And Password Not Match');	
    	}
    	echo json_encode($arr);
    }
}
