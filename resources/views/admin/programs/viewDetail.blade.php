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
            <a href="{{ url('admin/programs/edit/'.$getRecord->id) }}" class="btn btn-primary"><i class="fas fa-pen" ></i> Edit</a>
            <a href="{{ url('admin/programs/delete/'.$getRecord->id) }}" class="btn btn-danger"> Delete</a>
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
                <h3 class="card-title">Program Detail</h3>
              </div>
              
              <div class="card-body p-3">
                <div class="pt-1 pb-2"><strong>Program Name</strong> <br>{{ $getRecord->program_name }}</div>
                <div><strong>Details</strong><br> {{ $getRecord->description }}</div>
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