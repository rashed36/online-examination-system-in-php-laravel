<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oex_category;
use App\Oex_exam_master;
use App\Oex_students;
use App\Oex_portal;
use App\Oex_exam_question_master;
use Validator;
class Admin extends Controller
{
    public function index()
	{
		return view('admin.dashboard');
	}
	public function exam_category()
	{
		$data['category']=Oex_category::orderBy('id','desc')->get()->toArray();
		return view('admin.exam_category',$data);
	}
	public function add_new_category(Request $request)
	{
		$validator=Validator::make($request->all(),['name'=>'required']);
		if($validator->passes())
		{
			$cat = new Oex_category();
			$cat->name=$request->name;
			$cat->status=1;
			$cat->save();
			$arr=array('status'=>'true','message'=>'success','reload'=>url('admin/exam_categry'));
		}
		else 
		{
			$arr=array('status'=>'false','message'=>$validator->errors()->all());
		}
		echo json_encode($arr);
	}
	public function delete_category($id)
	{
		$cat = Oex_category::where('id',$id)->get()->first();
		$cat->delete();
		return redirect(url('admin/exam_categry'));
	}
	public function edit_category($id)
	{
		$category=Oex_category::where('id',$id)->get()->first();
		return view('admin.edit_category',['category'=>$category]);
	}
	public function edit_new_category(Request $request)
	{
		$cat =Oex_category::where('id',$request->id)->get()->first();
		$cat->name=$request->name;
		$cat->update();
		echo json_encode(array('status'=>'true','message'=>'Category Successfully Updated','reload'=>url('admin/exam_categry')));
	}
	public function category_status($id)
	{
		$cat=Oex_category::where('id',$id)->get()->first();
		if($cat->status==1)
			$status=0;
		else 
			$status=1;
		$cat1=Oex_category::where('id',$id)->get()->first();
		$cat1->status=$status;
		$cat1->update();
	}
	public function manage_exam()
	{
		$data['category']=Oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();
		
		$data['exams']=Oex_exam_master::
		select(['oex_exam_masters.*','oex_categories.name as cat_name'])
		->orderBy('id','desc')
		->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
		->get()->toArray();

		return view('admin.manage_exam',$data);
	}
	public function add_new_exam(Request $request)
	{
		$validator=Validator::make($request->all(),['title'=>'required','exam_date'=>'required','exam_category'=>'required']);
		if($validator->passes())
		{
			$exam=new Oex_exam_master();
			$exam->title=$request->title;
			$exam->exam_date=$request->exam_date;
			$exam->category=$request->exam_category;
			$exam->status=1;
			$exam->save();
			$arr=array('status'=>'true','message'=>'Exam Successfully Added','reload'=>url('admin/manage_exam'));
		}
		else 
		{
			$arr=array('status'=>'false','message'=>$validator->errors()->all());
		}
		echo json_encode($arr);
	}
	public function exam_status($id)
	{
		$exma=Oex_exam_master::where('id',$id)->get()->first();
		if($exma->status==1)
			$status=0;
		else 
			$status=1;
		$exma1=Oex_exam_master::where('id',$id)->get()->first();
		$exma1->status=$status;
		$exma1->update();
	}
	public function delete_exam($id)
	{
		$exma1=Oex_exam_master::where('id',$id)->get()->first();
		$exma1->delete();
		return redirect(url('admin/manage_exam'));
	}
	public function edit_exam($id)
	{
		$data['exam']=Oex_exam_master::where('id',$id)->get()->first();
		$data['category']=Oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();
		return view('admin.edit_exam',$data);
	}
	public function edit_exam_sub(Request $request)
	{
		$exam=Oex_exam_master::where('id',$request->id)->get()->first();
		$exam->title=$request->title;
		$exam->exam_date=$request->exam_date;
		$exam->category=$request->exam_category;
		$exam->update();
		echo json_encode(array('status'=>'true','message'=>'Exam Successfully Updated','reload'=>url('admin/manage_exam')));
	}
	public function manage_students()
	{
		$data['exams']=Oex_exam_master::where('status','1')->get()->toArray();
		$data['students']=Oex_students::select(['oex_students.*','oex_exam_masters.title as ex_name','oex_exam_masters.exam_date'])->orderBy('id','desc')
		->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
		->get()->toArray();
		return view('admin.manage_students',$data);
	}
	public function add_new_students(Request $request)
	{
		$validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','dob'=>'required','exam'=>'required','password'=>'required']);
		if($validator->passes())
		{
			$std = new Oex_students();
			$std->name=$request->name;
			$std->email=$request->email;
			$std->mobile_no=$request->mobile_no;
			$std->exam=$request->exam;
			$std->password=$request->password;
			$std->dob=$request->dob;
			$std->status=1;
			$std->save();
			$arr=array('status'=>'true','message'=>'Student Successfully Added','reload'=>url('admin/manage_students'));
		}
		else 
		{
			$arr=array('status'=>'false','message'=>$validator->errors()->all());
		}
		echo json_encode($arr);
	}
	public function student_status($id)
	{
		$exma=Oex_students::where('id',$id)->get()->first();
		if($exma->status==1)
			$status=0;
		else 
			$status=1;
		$exma1=Oex_students::where('id',$id)->get()->first();
		$exma1->status=$status;
		$exma1->update();
	}
	public function delete_students($id)
	{
		$std=Oex_students::where('id',$id)->get()->first();
		$std->delete();
		return redirect(url('admin/manage_students'));
	}
	public function edit_students($id)
	{
		$std=Oex_students::where('id',$id)->get()->first();
		$exams=Oex_exam_master::where('status','1')->get()->toArray();
		return view('admin.edit_students',['students'=>$std,'exams'=>$exams]);
	}
	public function edit_students_final(Request $request)
	{
		$std=Oex_students::where('id',$request->id)->get()->first();
		$std->name=$request->name;
		$std->email=$request->email;
		$std->mobile_no=$request->mobile_no;
		$std->exam=$request->exam;
		if($request->password!='')
		{
			$std->password=$request->password;
		}
		$std->dob=$request->dob;
		$std->update();
		echo json_encode(array('status'=>'true','message'=>'Student Successfully Updated','reload'=>url('admin/manage_students')));
	}
	public function manage_portal()
	{
		$data['portal']=Oex_portal::orderBy('id','desc')->get()->toArray();
		return view('admin.manage_portal',$data);
	}
	public function add_new_portal(Request $request)
	{
		$validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
		if($validator->passes())
		{
			$p = new Oex_portal();
			$p->name=$request->name;
			$p->email=$request->email;
			$p->mobile_no=$request->mobile_no;
			$p->password=$request->password;
			$p->status=1;
			$p->save();
			$arr=array('status'=>'true','message'=>'Portal Successfully Added','reload'=>url('admin/manage_portal'));
		}
		else 
		{
			$arr=array('status'=>'false','message'=>$validator->errors()->all());
		}
		echo json_encode($arr);
	}
	public function portal_status($id)
	{
		$exma=Oex_portal::where('id',$id)->get()->first();
		if($exma->status==1)
			$status=0;
		else 
			$status=1;
		$exma1=Oex_portal::where('id',$id)->get()->first();
		$exma1->status=$status;
		$exma1->update();		
	}
	public function delete_portal($id)
	{
		$portal = Oex_portal::where('id',$id)->get()->first();
		$portal->delete();
		return redirect(url('admin/manage_portal'));
	}
	public function edit_portal($id)
	{
		$data['portal_info']=Oex_portal::where('id',$id)->get()->first();
		return view('admin.edit_portal',$data);
	}
	public function edit_portal_sub(Request $request)
	{
			$portal=Oex_portal::where('id',$request->id)->get()->first();
			$portal->name=$request->name;
			$portal->email=$request->email;
			$portal->mobile_no=$request->mobile_no;
			if($request->password!='')
					$portal->password=$request->password;
			$portal->update();
			echo json_encode(array('status'=>'true','message'=>'Portal Successfully Updated','reload'=>url('admin/manage_portal')));
	}
	public function add_question($id)
	{
		$data['questions']=Oex_exam_question_master::where('exam_id',$id)->get()->toArray();
		return view('admin.add_question',$data);
	}
	public function add_new_question(Request $request)
	{
		$validator=Validator::make($request->all(),['question'=>'required','option1'=>'required','option2'=>'required','option3'=>'required','option4'=>'required','ans'=>'required']);
		if($validator->passes())
		{
			$question = new Oex_exam_question_master();
			$question->exam_id=$request->exam_id;
			$question->question=$request->question;
			$question->ans=$request->ans;
			$question->status=1;
			$question->options=json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));
			$question->save();
			$arr=array('status'=>'true','message'=>'Question Successfully Added','reload'=>url('admin/add_question/'.$request->exam_id));
		}
		else 
		{
			$arr=array('status'=>'false','message'=>$validator->errors()->all());
		}
		echo json_encode($arr);
	}
	public function question_status($id)
	{
		$exma=Oex_exam_question_master::where('id',$id)->get()->first();
		if($exma->status==1)
			$status=0;
		else 
			$status=1;
		$exma1=Oex_exam_question_master::where('id',$id)->get()->first();
		$exma1->status=$status;
		$exma1->update();			
	}
	public function delete_question($id)
	{
		$question = Oex_exam_question_master::where('id',$id)->get()->first();
		$exam_id=$question->exam_id;
		$question->delete();
		return redirect(url('admin/add_question/'.$exam_id));
	}
	public function update_question($id)
	{
		$data['queastion']=Oex_exam_question_master::where('id',$id)->get()->toArray();
		return view('admin.update_question',$data);
	}
	public function edit_question_inner(Request $request)
	{
		$question = Oex_exam_question_master::where('id',$request->id)->get()->first();
		$question->question=$request->question;
		$question->ans=$request->ans;
		$question->options=json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));
		$question->update();
		echo json_encode(array('status'=>'true','message'=>'Question Successfully Updated','reload'=>url('admin/add_question/'.$question->exam_id)));

	}
}
