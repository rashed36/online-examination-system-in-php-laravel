<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Oex_exam_master;
use Validator;
use App\Oex_students;
class PortalOOperation extends Controller
{
    public function dashboard()
    {
    	if(!Session::get('portal_session'))
		{
			return redirect(url('portal/login'));
		}	
		$data['portal_exams']=Oex_exam_master::select(['oex_exam_masters.*','oex_categories.name as cat_name'])->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')->orderBy('id','desc')->where('oex_exam_masters.status','1')->get()->toArray();
    	return view('portal.dashboard',$data);

    }
    public function exam_from($id)
    {
        $data['id']=$id;
        $exam_info=Oex_exam_master::where('id',$id)->get()->first();
        $data['exam_title']=$exam_info->title;
        $data['exam_date']=$exam_info->exam_date;
        return view('portal.exam_from',$data);
    }
    public function exam_from_submit(Request $request)
    {
        $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
        if($validator->passes())
        {
                $std = new Oex_students();
                $std->name=$request->name;
                $std->email=$request->email;
                $std->mobile_no=$request->mobile_no;
                $std->exam=$request->id;
                $std->dob=$request->dob;
                $std->password=$request->password;
                $std->save();
                $arr=array('status'=>'true','message'=>'success','reload'=>url('portal/print/'.$std->id));

        }
        else 
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    public function print($id)
    {
        $std_info=Oex_students::where('id',$id)->get()->first();
        $exam_info=Oex_exam_master::where('id',$std_info->exam)->get()->first();
        $exam_title=$exam_info->title;
        $exam_date=$exam_info->exam_date;
        return view('portal.print',['std_info'=>$std_info,'exam_title'=>$exam_title,'exam_date'=>$exam_date]);
    }
    public function update_form()
    {
        $data['exmas']=Oex_exam_master::where('status','1')->get()->toArray();
        return view('portal.update_form',$data);
    }
    public function student_exam_info()
    {
        $data['exam_info']=Oex_exam_master::where('id',$_GET['exam'])->get()->first();
        $data['student_info']=Oex_students::where('mobile_no',$_GET['mobile_no'])->where('dob',$_GET['dob'])->where('exam',$_GET['exam'])->get()->toArray();
        return view('portal.student_exam_info',$data);
    }
    public function student_exam_info_edit(Request $request)
    {
        $std=Oex_students::where('id',$request->id)->get()->first();
        $std->name=$request->name;
        $std->email=$request->email;
        $std->mobile_no=$request->mobile_no;
        $std->dob=$request->dob;
        if($request->password)
        {
            $std->password=$request->password;
        }
        $std->update();
        echo json_encode(array('status'=>'true','message'=>'success','reload'=>url('portal/update_form')));
    }
    public function logout(Request $request)
    {
        $request->session()->forget('portal_session');
        return redirect(url('portal/login'));
    }
}
