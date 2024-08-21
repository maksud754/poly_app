@extends('layouts.app')
  @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Course</h1>
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
                  <!-- <div class="form-group">
                    <label>Course Code</label>
                    <input type="text" class="form-control" name="coursecode" placeholder="Enter Course code">
                  </div> -->
                  <div class="form-group">
                    <label>Course Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter course name" required>
                  </div>
                  <div class="form-group">
                    <label>Select Program</label>
                    <select class="form-control" name="program">
                      @foreach($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Lecturer</label>
                    <select class="form-control" name="lecturer">
                      @foreach($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                      @endforeach
                    </select>
                  </div>
                    
                  <div class="form-group">
                    <label>Course Outline</label>
                    <input type="file" class="form-control" name="material" accept=".pdf,.doc,.docx">
                  </div>
                  <!-- <div class="form-group">
                    <label>Course Material</label>
                    <input type="file" class="form-control" name="material" accept=".pdf,.doc,.docx">
                  </div> -->
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