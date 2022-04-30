@php
use App\Models\Product;

@endphp
@extends('dashboard')

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
            <li class="breadcrumb-item active">View All Products</li>
            <li class="breadcrumb-item active"> <a href="{{ route('products.create') }}"> Create New Product</a></li>


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
          <h3 class="card-title">All Products</h3>

          {{-- <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th style="">Product</th>
                <th style="">Picture</th>
                <th style="">Qty</th>
                <th style="">price</th>
                <th style="">Status</th>
                <th style="">notes</th>
                <th style="">Actions</th>

              </tr>
            </thead>
            {{-- {{ Product::all() }} --}}
            <tbody>
              @foreach($products as $product)
              <tr>
                <td> {{ $product->id }}</td>{{-- product id --}}

                <td>{{ $product->name }}</td>

                <td>{{ $product->img ?? 'none: click to add' }}</td>

                <td>{{ $product->qty }}</td>

                <td>{{ $product->price }}</td>

                @if($product->status)
                <td><span class="badge bg-success">{{ $product->status ? 'Available' : '' }}</span></td>
                @else
                <td><span class="badge bg-danger">{{ $product->status ? 'Unavailable' : '' }}</span></td>
                @endif

                @if($product->notes)
                <td><span class="badge bg-success">{{ 'Yes' }}</span></td>

                @else
                <td><span class="badge bg-info">{{ 'No' }}</span></td>
                @endif


                {{-- actions --}}
                <td style="cursor:progress" class="d-flex">
                  <div class="mr-1">
                    <a class="btn btn-sm btn-info" href="{{ route('products.edit', $product->id) }}"> Edit </a>

                  </div>
                  <form method="post" action="{{ route('products.destroy', $product->id) }}">@csrf
                    @method('DELETE')
                    <!-- <input type="hidden"  value="{{ $product->id }}" name="product" /> -->
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
