@extends('layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee List</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="/employees/create" class="btn btn-primary">New Employee</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if (Session::has('delete'))
            <div class="alert alert-danger custom-alert-danger" role="alert">
              {{ Session::get('delete') }}
            </div>
            @endif
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>photo</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td><img src="{{ $employee->photo ? Storage::url($employee->photo) : '/dist/img/avatar6.png' }}" width="50" height="50" alt=""></td>
                    <td>{{ $employee->designation->title }}</td>
                    <td>
                        <a href="/employees/{{ $employee->id }}/edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="/employees/{{ $employee->id }}" method="POST" id="delete-form">
                            @method('DELETE')
                            @csrf
                        <button type="submit" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                        </form>
                   </td>
                </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection