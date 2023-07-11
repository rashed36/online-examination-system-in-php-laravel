@extends('layouts.app')
@section('title','Update Exam Question')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Question</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Question</li>
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

                </div>
              </div>
              <div class="card-body">
               <form action="{{ url('admin/edit_question_inner') }}" class="database_operation">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Question</label>
                        {{ csrf_field() }}
                        <input type="hidden"  name="id" value="{{ $queastion[0]['id'] }}">
                        <input type="text" value="{{ $queastion[0]['question'] }}" required="required" name="question" placeholder="Enter Question" class="form-control">
                      </div>
                    </div>
                    <?php 
                    $options=json_decode($queastion[0]['options']);
                    ?>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Enter Option 1</label>
                        <input type="text" required="required" name="option1" value="{{ $options->option1 }}" placeholder="Enter Option 1" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Enter Option 2</label>
                        <input type="text" value="{{ $options->option2 }}" required="required" name="option2" placeholder="Enter Option 2" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Enter Option 3</label>
                        <input type="text" required="required" name="option3" value="{{ $options->option3 }}" placeholder="Enter Option 3" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Enter Option 4</label>
                        <input type="text" value="{{ $options->option4 }}" required="required" name="option4" placeholder="Enter Option 4" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Right Ans</label>
                        <input type="text" required="required" name="ans" value="{{ $queastion[0]['ans'] }}" placeholder="Enter Right Ans" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button class="btn btn-primary">Update</button>
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