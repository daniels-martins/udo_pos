@php

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
            <li class="breadcrumb-item active">View All Stores</li>
            <li class="breadcrumb-item active"> <a href="{{ route('stores.create') }}"> Create New Store</a></li>


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
          <h3 class="card-title">All Stores</h3>

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
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th style="">Store</th>
                <th style="">Picture</th>
                <th style="">Address</th>
                <th style="">Status</th>
                <th style="">notes</th>
                <th style="">Actions</th>

              </tr>
            </thead>
            {{-- {{ storet::all() }} --}}
            <tbody>
              @foreach($stores as $store)
              <tr>
                <td> {{ $store->id }}</td>{{-- store id --}}

                <td>{{ $store->name }}</td>

                <td>{{ $store->img ?? 'none: click to add' }}</td>

                <td>{{ $store->address }}</td>


                @if($store->status)
                <td><span class="badge bg-primary rounded-circle">&#10003;</span></td>
                @else
                <td><span class="badge bg-danger">{{ ' ' }}</span></td>
                @endif

                @if($store->desc)
                <td><span class="badge bg-primary rounded-circle">&#10003;</span></td>

                @else
                <td><span class="badge bg-info">{{ ' ' }}</span></td>
                @endif


                {{-- actions --}}
                <td style="cursor:progress" class="d-flex">
                  <div class="mr-1">
                    <a class="btn btn-sm btn-info" href="{{ route('stores.edit', $store->id) }}"> Edit </a>

                  </div>
                  <form method="post" action="{{ route('stores.destroy', $store->id) }}">@csrf
                    @method('DELETE')
                    <!-- <input type="hidden"  value="{{ $store->id }}" name="store" /> -->
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
