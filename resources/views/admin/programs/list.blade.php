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
            <a href="{{ url('admin/programs/add') }}" class="btn btn-primary"><i class="fas fa-plus" ></i> New Program</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Program</h3>
              </div>
              <form method="GET" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="Search with program id...">
                    </div>
                    <div class="form-group col-md-3">
                      <input type="text" class="form-control" value="{{ Request::get('program_name') }}" name="program_name" placeholder="Search with program name...">
                    </div>
                    <div class="form-group col-md-3">
                      <input type="date" class="form-control" value="{{ Request::get('date') }}" name="date">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                      <a href="{{ url('admin/programs/list') }}" class="btn btn-warning">Clear</a>
                    </div>
                  </div>
                </div>

              </form>
            </div>
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Program List (Total : {{ $getRecord->total() }})</h3>
              </div>
              
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>##</th>
                      <th>Name</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->program_name }}</td>
                        <td>{{ date('d-m-y H:i:A', strtotime($value->created_at)) }}</td>
                        <td>
                          <a href="{{ url('admin/programs/viewDetail/'.$value->id) }}" class="btn btn-primary">View Detail</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="float:right">
                  {{ $getRecord->links() }}
                </div>

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