@extends('admin.layout.dashboard')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <!-- @if(session()->has('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif -->

        <div class="col-sm-6">
          <h1>{{ Str::upper(Route::currentRouteName()) }}</h1>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"> <a href="{{ route('categories.index') }}"> View My Company</a></li>




          </ol>
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
              <h3 class="card-title">All Categories</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 350px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div><!-- /.card-header -->

            @if($company->count())

            <div class="card-body col-sm-4">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 20rem">Company Name</th>
                    <th style="width: 2rem;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    
                  @if($coy = $company)
                  <tr>
                    {{-- product id --}}
                    <td> {{ $coy->id }}</td>
                    {{-- cat name --}}
                    <td>{{ $coy->name }}</td>

                    {{-- cat qty --}}
                    {{-- actions --}}
                    <td style="cursor:progress" class="d-flex">
                      <div class="mr-1">
                        <a class="btn btn-sm btn-info" href="{{ route('firms.edit', $coy->id) }}"> Edit </a>

                      </div>
                      <form method="post" action="{{ route('firms.destroy', $coy->id) }}">@csrf
                        @method('DELETE')
                        <!-- <input type="hidden"  value="{{ $coy->id }}" name="product" /> -->
                        <input class="btn btn-sm  btn-danger" type="submit" value="Delete">
                      </form>
                    </td>
                  </tr>
                  @endif
                  

                </tbody>
              </table>
            </div>
            @else
                    <h3  class="text-center"> <p class="mt-5 mb-5"> OOps! You currently have no company registered, <br><br>
                       Without a company, we cannot configure your invoice management system. <br>
                      Kindly <a href="{{ route('firms.create') }}" class="">CLICK HERE </a> to create a new company for invoice configuration
                       <br><br> </p>
                    </h3>
                  @endif
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>

          <!-- Default box -->
        </div>
      </div>
  </section><!-- /.content -->
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

