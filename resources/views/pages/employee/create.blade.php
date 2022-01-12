@extends('layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Employee</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              @if (Session::has('success'))
              <div class="alert alert-primary custom-alert" role="alert">
                {{ Session::get('success') }}
              </div>
              @endif
            <div class="card card-primary">
                
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="/employees" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter Name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" placeholder="Enter email">
                      @error('email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="customFile">Photo</label>
                      <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="photo" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                      @error('photo')
                      <span class="text-danger">{{ $message }}</span>
                     @enderror

                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <select name="designation" class="form-control" id="designation">
                        <option value="">Select Designation</option>
                        @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}" {{ $designation->id == old('designation') ? 'selected' : '' }}>{{ $designation->title }}</option>
                        @endforeach
                        </select>
                        @error('designation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/employees" class="btn btn-danger">Cancel</a>
                  </div>
                </form>
              </div>
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