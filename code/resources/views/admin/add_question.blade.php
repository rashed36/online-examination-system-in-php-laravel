@extends('layouts.app')
@section('title','Exam Question')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exam Question</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exam Question</li>
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
              <div class="card-header">

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover datatable">
                  <thead>
                  	<tr>
	                    <th>#</th>
	                    <th>Question</th>
	                    <th>Ans</th>
	                    <th>Status</th>
	                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($questions as $key => $question)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $question['question'] }}</td>
                    <td>{{ $question['ans'] }}</td>
                    <td><input class="question_status" data-id="{{ $question['id'] }}" <?php if($question['status']==1) { ?> checked <?php  } ?> type="checkbox" name="status"></td>
                    <td>
                      <a href="{{ url('admin/delete_question/'.$question['id']) }}" class="btn btn-danger btn-sm">Delete</a>
                      <a href="{{ url('admin/update_question/'.$question['id']) }}" class="btn btn-info btn-sm">Update</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Question</th>
                      <th>Ans</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
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
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add New Question</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form action="{{ url('admin/add_new_question') }}" class="database_operation">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Question</label>
            {{ csrf_field() }}
            <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
            <input type="text" required="required" name="question" placeholder="Enter Question" class="form-control">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 1</label>
            <input type="text" required="required" name="option1" placeholder="Enter Option 1" class="form-control">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 2</label>
            <input type="text" required="required" name="option2" placeholder="Enter Option 2" class="form-control">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 3</label>
            <input type="text" required="required" name="option3" placeholder="Enter Option 3" class="form-control">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 4</label>
            <input type="text" required="required" name="option4" placeholder="Enter Option 4" class="form-control">
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Right Ans</label>
            <input type="text" required="required" name="ans" placeholder="Enter Right Ans" class="form-control">
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <button class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>

</div>
</div>
  @endsection
