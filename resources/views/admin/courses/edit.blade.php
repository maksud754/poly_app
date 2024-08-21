@extends('layouts.app')
  @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Course</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <form method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Course Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $getRecord->course_name }}">
                  </div>
                  <div class="form-group">
                    <label>Select Program</label>
                    <select class="form-control select2" name="program">
                        <option value="{{ $getRecord->program_id }}" selected>{{ $getRecord->program_name }}</option>
                      @foreach($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Lecturer</label>
                    <select class="form-control select2" name="lecturer">
                        <option value="{{ $getRecord->lecturer_id }}" selected>{{ $getRecord->lecturer_name}}</option>
                      @foreach($lecturers as $lecturer)
                        <option value="{{ $lecturer->name }}">{{ $lecturer->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Course Outline</label>
                    <input type="file" class="form-control" name="material" accept=".pdf,.doc,.docx">
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection