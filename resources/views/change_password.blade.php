@extends('dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->

        <div class="col-md-6 mt-5">
          {{-- @if(session()->has('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif --}}

          <!-- Horizontal Form -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Change Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="form-horizontal" action={{ route("password.modify") }} method='post'> @csrf
              <div class="card-body">
                {{-- current password field --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="current_password" name='current_password' placeholder="Enter current Password">
                  </div>
                  @error('current_password')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                {{-- new password field --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name='password' placeholder="Enter New Password">
                  </div>
                </div>

                {{-- confirm new password field --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id='password_confirmation' name='password_confirmation' placeholder="Confirm New Password">
                  </div>
                  @error('password')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Change Password</button>
                <button type="button" onclick="history.go(-1)" class="btn btn-default float-right">Cancel</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div><!-- /.content-wrapper -->
@endsection
