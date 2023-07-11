@extends('layouts.portal')
@section('title','Portal Dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          @foreach($portal_exams as $key => $exam)
          <?php 
          $val=$key+1;
          if(strtotime(date('Y-m-d'))>strtotime($exam['exam_date']))
          {
              $cls="bg-danger";
          }        
          else 
          {
              if($val%2==0)
                $cls="bg-info";
              else 
                $cls="bg-success";
          }
          ?>
           <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box <?php echo $cls ?>">
              <div class="inner">
                <h3><?php echo $exam['title'] ?></h3>

                <p><?php echo $exam['cat_name']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              @if(strtotime(date('Y-m-d')) < strtotime($exam['exam_date']))
              <a href="{{ url('portal/exam_from/'.$exam['id']) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
            </div>
            </div>
          @endforeach;
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection