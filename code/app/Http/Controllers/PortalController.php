<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Oex_portal;
use Session;
class PortalController extends Controller
{
    public function portal_singup()
    {
        if(Session::get('portal_session'))
        {
            return redirect(url('portal/dashboard'));
        }
    	return view('portal.signup');
    }
    public function signup_sub(Request $request)
    {
    	$validator=Validator($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
    	if($validator->passes())
    	{
            $is_exists=Oex_portal::where('email',$request->email)->get()->toArray();
            if($is_exists)
            {
                $arr=array('status'=>'false','message'=>'E-Mail Already Exists');
            }
            else 
            {
        		$portal=new Oex_portal();
        		$portal->name=$request->name;
        		$portal->email=$request->email;
        		$portal->mobile_no=$request->mobile_no;
        		$portal->password=$request->password;
        		$portal->save();
        		$arr=array('status'=>'true','message'=>'Success','reload'=>url('portal/login'));
            }
    	}
    	else 
    	{
    		$arr=array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	echo json_encode($arr);
    }
    public function login()
    {
        if(Session::get('portal_session'))
        {
            return redirect(url('portal/dashboard'));
        }
        return view('portal.login');
    }
    public function login_sub(Request $request)
    {
        $portal=Oex_portal::where('email',$request->email)->where('password',$request->password)->get()->toArray();
        if($portal)
        {
            if($portal[0]['status']==1)
            {
                $request->session()->put('portal_session',$portal[0]['id']);
                $arr=array('status'=>'true','message'=>'success','reload'=>url('portal/dashboard'));
            }

            else 
            {
                $arr=array('status'=>'false','message'=>'Your Account Deactived');
            }
        }
        else 
        {
             $arr=array('status'=>'false','message'=>'Email And Password Not Match');
        }
        echo json_encode($arr);
    }
}
