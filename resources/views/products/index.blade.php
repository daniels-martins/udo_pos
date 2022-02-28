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
            <li class="breadcrumb-item active">Edit Product</li>
            <li class="breadcrumb-item active"> <a href="{{ route('products.create') }}"> Create New Product</a></li>


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
              <h3 class="card-title">Bordered Table</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 350px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
              
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div><!-- /.card-header -->

  
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Product name</th>
                    {{-- this header will be programmed later --}}
                    {{-- <th>Product Qty Signal</th> --}}
                    {{-- potential table data  --}}
                      {{-- <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                      </div> --}}
                      {{-- <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 15%"></div>
                      </div> --}}
                    <th style="width: min-content">Product Qty </th>
                    <th style="width: 100px">Status</th>
                    <th style="width: 100px">Actions</th>
                    <!-- <th style="width: 40px">Label</th> -->
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    {{-- product id --}}
                    <td> {{ $product->id }}</td>
                    {{-- product name --}}
                    <td>{{ $product->name }}</td>

                    {{-- product qty --}}
                    <td>{{ $product->qty }}</td>

                    {{--  status (avaailability)--}}
                    <td>

                    @if($product->status)
                      <span class="badge bg-success">Available</span>
                      @elseif($product->qty < $product->alert_qty)
                      <span class="badge bg-warning">Low stock</span>
                      @else
                      <span class="badge bg-danger">Unvailable</span>
                    @endif
                  </td>
                    {{-- actions --}}
                  <td style="cursor:progress" class="d-flex">
                    <div class="mr-1">
                    <a class="btn btn-sm btn-info" href="{{ route('products.edit', $product->id) }}"> Edit </a>
                    </div>
                    <form action="post">
                      <input class="btn btn-sm  btn-danger" type="submit" value="Delete">
                    </form>
                  </td>



                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Products List</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                  title="Remove">
                  <i class="fas fa-times"></i></button> -->
              </div>
            </div>
            <div class="card-body">
              Start creating your amazing application!

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div><!-- /.card -->
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
