@extends('layouts.app')
  @section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('admin/courses/edit/'.$getRecord->id) }}" class="btn btn-primary"><i class="fas fa-pen" ></i> Edit</a>
            <a href="{{ url('admin/courses/delete/'.$getRecord->id) }}" class="btn btn-danger"> Delete</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Course Detail</h3>
              </div>
              
              <div class="card-body p-3">
                <div class="pt-1 pb-2"><strong>Program</strong><br> {{ $getRecord->program_name }}</div>
                <div class="pt-1 pb-2"><strong>Course</strong> <br>{{ $getRecord->course_name }}</div>
                <div class="pt-1 pb-2"><strong>Lecturer</strong><br> {{ $getRecord->lecturer_name }}</div>
                <div class="pt-1 pb-2"><strong>Course Outline</strong><br> <a class="btn btn-primary" href="{{ asset('public/'.$getRecord->material) }}">Click to Download</a></div>
                <!-- <div class="pt-1 pb-2"><strong>Subject Material</strong><br> <a href="{{ asset('public/'.$getRecord->material) }}">Download Material</a></div> -->
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection