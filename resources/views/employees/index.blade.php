@extends('dashboard')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ Str::upper(Route::currentRouteName()) }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"> <a href="{{ route('employees.index') }}"> View All Employees</a></li>
            <li class="breadcrumb-item"> <a href="{{ route('employees.create') }}">Create New Employee</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title mr-5">All Employees</h3>
          @if(count($employees) < 1)
          <h3 style="margin-left: 30rem;" class="card-title text-center">Sorry, There are Employees at the moment</h3>
          @endif

          
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead class="blu-table-header">
              <tr>
                <th style="width: 10px">#</th>
                <th style="">Employee</th>
                <th style="">Picture</th>
                <th style="">Shop Address</th>
                <th style="">Debtor</th>
                <th style="">House Address</th>
                <th style="">Phone</th>
                {{-- <th style="">Full Name</th> --}}
                <th style="">notes</th>
                <th style="">Actions</th>

              </tr>
            </thead>
            <tbody>
              @foreach($employees as $employee)
              <tr>
                <td> {{ $employee->id }}</td>{{-- employee id --}}

                <td>{{ $employee->username }}</td>

                <td>{{ $employee->img ?? 'none: click to add' }}</td>

                <td>{{ $employee->storeWarehouse->name ?? '11, Zamba Str, Ikate, Surulere, Lagos'}}</td>

                <td>{{ $employee->is_debtor }}</td>
                {{-- taken away due to space --}}
                <td>{{ $employee->billing_address ?? '1, Lawanson Rd, Ikate, Surulere, Lagos'}}</td>

                <td>{{ $employee->phone ?? 'no phone' }}</td>

                {{-- taken away due to space --}}
                {{-- <td>{{ $employee->fname  ?? $employee->lname ?? $employee->username }}</td> --}}

                @if($employee->notes)
                <td><span class="badge bg-success">{{ 'Yes' }}</span></td>

                @else
                <td><span class="badge bg-gray">{{ 'No' }}</span></td>
                @endif

                {{-- actions --}}
                <td style="cursor:progress" class="d-flex">
                  <div class="mr-1">
                    <a class="btn btn-sm btn-info" href="{{ route('employees.edit', $employee->id) }}"> Edit </a>
                  </div>
                  <form method="post" action="{{ route('employees.destroy', $employee->id) }}">@csrf
                    @method('DELETE')
                    <!-- <input type="hidden"  value="{{ $employee->id }}" name="product" /> -->
                    <input class="btn btn-sm  btn-danger" type="submit" value="Delete">
                  </form>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div><!-- /.card -->
    </div>
  </div><!-- /.row -->
</div>

@endsection
@push('child-scripts')
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true
      , "autoWidth": false
    , });
    $('#example2').DataTable({
      "paging": true
      , "lengthChange": false
      , "searching": false
      , "ordering": true
      , "info": true
      , "autoWidth": false
      , "responsive": true
    , });
  });

</script>

@endpush

