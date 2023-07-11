@extends('layouts.portal')
@section('title','Exam Form')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Exam Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Exam Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                          <h3>{{ $exam_info->title }}</h3>
                        </div>
                        <div class="col-sm-6">
                          <h3><span class="float-right">{{ date('d M,Y',strtotime($exam_info->exam_date))  }}</span></h3>
                        </div>
                    </div>
                    <form action="{{ url('portal/student_exam_info_edit') }}" class="database_operation">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Enter Name</label>
                          <input type="hidden" name="id" value="{{ $student_info[0]['id'] }}" >
                          {{ csrf_field() }}
                          <input type="text" name="name" value="{{ $student_info[0]['name'] }}" required="required" placeholder="Name" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Enter E-Mail</label>
                          <input type="email" required="required" value="{{ $student_info[0]['email'] }}" name="email" placeholder="E-Mail" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Enter Mobile No</label>
                          <input type="text" value="{{ $student_info[0]['mobile_no'] }}" name="mobile_no" placeholder="Mobile No" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Select DOB</label>
                          <input type="date" name="dob" value="{{ $student_info[0]['dob'] }}" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Enter Password</label>
                          <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                         <button class="btn btn-info">Update</button>
                        </div>
                      </div>
                    </div>
                    </form>
              </div>
              <!-- /.card-body -->
             
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div> 
  @endsection