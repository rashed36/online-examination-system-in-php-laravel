@extends('layouts.student')
@section('title','Join Exam')
@section('content')
<style type="text/css">
	.question_option>li{
		list-style: none;
		height: 50px;
		line-height: 50px;
	}
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Join Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Join Exam</li>
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
                  	<div class="col-sm-4">
                  		<h3>Time : 1 Hrs</h3>
                  	</div>
                  	<div class="col-sm-4">
                  		<h3 class="text-center">Timer : <span class="js-timeout">60:00</span></h3>
                  	</div>
                  	<div class="col-sm-4">
                  		<h3 class="text-right">Status : Running</h3>
                  	</div>
                  </div>

              </div>
              <!-- /.card-body -->
             
              <!-- /.card-footer-->
            </div>

            <div class="card mt-4">
              <div class="card-body">
                 <form action="{{ url('student/submit_question') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
                  <div class="row">
                  @foreach($all_question as $key => $question)
                  	<div class="col-sm-12">
                  		<p><b>{{ $key+1 }}. {{ $question['question'] }}</b></p>
                      <?php 
                      $options=json_decode(json_encode(json_decode($question['options'])),true);
                      ?>
                      <input type="hidden" name="question{{ $key+1 }}" value="{{ $question['id'] }}" >
                  		<ul class="question_option">
                  			<li><input type="radio" value="{{ $options['option1'] }}" name="ans{{ $key+1 }}"> {{ $options['option1'] }}</li>
                  			<li><input type="radio" value="{{ $options['option2'] }}" name="ans{{ $key+1 }}"> {{ $options['option2'] }}</li>
                  			<li><input type="radio" value="{{ $options['option3'] }}" name="ans{{ $key+1 }}"> {{ $options['option3'] }}</li>
                  			<li><input type="radio" value="{{ $options['option4'] }}" name="ans{{ $key+1 }}"> {{ $options['option4'] }}</li>
                        <li style="display: none;"><input value="0" type="radio" checked="checked" name="ans{{ $key+1 }}"> {{ $options['option4'] }}</li>

                  		</ul>
                  	</div>
                  @endforeach
                  	<div class="col-sm-12 mt-4">
                      <input type="hidden" name="index" value="<?php echo $key+1 ?>">
                  		<button type="submit" class="btn btn-info btn-block">Submit</button>
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