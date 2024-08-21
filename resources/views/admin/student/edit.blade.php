@extends('layouts.app')
  @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Student</h1>
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
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"  value="{{ $getRecord->email }}" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label>Matric No</label>
                    <input type="text" class="form-control" name="matric_no" value="{{ $getRecord->unique_id }}" disabled>
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
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <p>Do you want to change password? Please enter a new password..
                  </div>
                  
                  <div class="form-group">
                    <label>Profile Picture</label>
                    <input type="file" class="form-control" name="profile_picture" accept="image/*">
                  </div>
                  <div class="image">
                    <img src="{{ asset('public/' . $getRecord->profile_picture)}}" width="100" height="100">
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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