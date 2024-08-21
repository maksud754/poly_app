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
            <a href="{{ url('admin/edit/'.$getRecord->id) }}" class="btn btn-primary"><i class="fas fa-pen" ></i> Edit</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Account (Staff Id: {{ $getRecord->unique_id}})</h3>
              </div>
              
              <div class="card-body p-3" style="font-size: 20px;">
                <div class="pt-1 pb-2"><strong>Name</strong> <br>{{ $getRecord->name }}</div>
                <div class="pt-1 pb-2"><strong>Email</strong><br> {{ $getRecord->email }}</div>
                <div class="pt-1 pb-2"><strong>Registration Date</strong><br> {{ $getRecord->created_at }}</div>
                <div class="pt-1 pb-2"><strong>Update Date</strong><br> {{ $getRecord->updated_at }}</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Profile Photo</h3>
              </div>
              
              <div class="card-body p-3">
                <div class="col-md-6">
                  @if($getRecord->profile_picture)
                    <img src="{{ asset('public/' . $getRecord->profile_picture)}}" alt="Profile Image" width="240">
                  @else
                    <img src="{{ url('public/dist/img/user2-160x160.jpg')}}" alt="Profile Image" width="240">
                  @endif
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection