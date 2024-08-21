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
            <a href="{{ url('admin/admin/add') }}" class="btn btn-primary"><i class="fas fa-plus" ></i> New Admin</a>
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
                <h3 class="card-title">Search Admin</h3>
              </div>
              <form method="GET" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Search with name...">
                    </div>
                    <div class="form-group col-md-3">
                      <input type="text" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Search with email...">
                    </div>
                    <div class="form-group col-md-3">
                      <input type="date" class="form-control" value="{{ Request::get('date') }}" name="date">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                      <a href="{{ url('admin/admin/list') }}" class="btn btn-warning">Clear</a>
                    </div>
                  </div>
                </div>

              </form>
            </div>
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin List (Total : {{ $getRecord->total() }})</h3>
              </div>
              
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Profile Image</th>
                      <th>Name</th>
                      <th>Staff Id</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>
                          @if($value->profile_picture)
                            <img src="{{ asset('public/' . $value->profile_picture)}}" class="img-circle elevation-2" alt="User Image" width="50" height="50">
                          @else
                            <img src="{{ url('public/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" width="50"  height="50">
                          @endif
                        </td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->unique_id }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                          <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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