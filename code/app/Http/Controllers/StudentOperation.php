<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Oex_students;
use App\Oex_exam_question_master;
use App\model\Oex_result;
class StudentOperation extends Controller
{
    public function dashboard()
    {
    	if(!Session::get('id')) 
    	{
    		return redirect(url('student/signup'));
    		die();
    	}
    	return view('student/dashboard');
    }
    public function exam()
    {
        $student_info=Oex_students::select(['oex_students.*','oex_exam_masters.title','oex_exam_masters.exam_date'])->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')->where('oex_students.id',Session::get('id'))->get()->first();
        $exam_join=Oex_result::where('exam_id',$student_info->exam)->where('user_id',Session::get('id'))->get()->first();
        return view('student.exam',['student_info'=>$student_info,'exam_join'=>$exam_join]);
    }
    public function logout(Request $request)
    {
    	$request->session()->forget('id');
    	return redirect(url('student/signup'));
    }
    public function join_exam($id)
    {
        $data['all_question']=Oex_exam_question_master::where('exam_id',$id)->get()->toArray();
       return view('student.join_exam',$data);
    }
    public function submit_question(Request $request)
    {
        $yes_ans=0;
        $no_ans=0;
        $data=$request->all();
        $result=array();
        for($i=1;$i<=$request->index;$i++)
        {
            if(isset($data['question'.$i]))
            {
                $question=Oex_exam_question_master::where('id',$data['question'.$i])->get()->first();
                if($question->ans==$data['ans'.$i])
                {
                    $result[$data['question'.$i]]='YES';
                    $yes_ans++;
                }
                else 
                {
                    $result[$data['question'.$i]]='NO';
                    $no_ans++;

                }
            }
        }
        $res = new Oex_result();
        $res->exam_id=$request->exam_id;
        $res->user_id=Session::get('id');
        $res->yes_ans=$yes_ans;
        $res->no_ans=$no_ans;
        $res->result_json=json_encode($result);
        $res->save();
        return redirect(url('student/show_result/'.$res->id));
    }
    public function show_result($id)
    {
        $data['result_info']=Oex_result::where('id',$id)->get()->first();
        $data['student_info']=Oex_students::select(['oex_students.*','oex_exam_masters.title','oex_exam_masters.exam_date'])->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')->where('oex_students.id',Session::get('id'))->get()->first();
        return view('student.show_result',$data);
    }
}
