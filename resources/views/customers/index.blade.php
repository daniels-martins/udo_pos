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
            <li class="breadcrumb-item active"> <a href="{{ route('customers.index') }}"> View All Customers</a></li>
            <li class="breadcrumb-item"> <a href="{{ route('customers.create') }}">Create New Customer</a></li>
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
          <h3 class="card-title">All Customers</h3>

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
                <th style="">Client</th>
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
              @foreach($clients as $client)
              <tr>
                <td> {{ $client->id }}</td>{{-- client id --}}

                <td>{{ $client->username }}</td>

                <td>{{ $client->img ?? 'none: click to add' }}</td>

                <td>{{ $client->shipping_address ?? '11, Zamba Str, Ikate, Surulere, Lagos'}}</td>

                <td>{{ $client->is_debtor }}</td>
                {{-- taken away due to space --}}
                <td>{{ $client->billing_address ?? '1, Lawanson Rd, Ikate, Surulere, Lagos'}}</td>

                <td>{{ $client->phone ?? 'no phone'. ',' . $client->mobile ?? 'no mobile'}}</td>

                {{-- taken away due to space --}}
                {{-- <td>{{ $client->fname  ?? $client->lname ?? $client->username }}</td> --}}

                @if($client->notes)
                <td><span class="badge bg-success">{{ 'Yes' }}</span></td>

                @else
                <td><span class="badge bg-gray">{{ 'No' }}</span></td>
                @endif

                {{-- actions --}}
                <td style="cursor:progress" class="d-flex">
                  <div class="mr-1">
                    <a class="btn btn-sm btn-info" href="{{ route('customers.edit', $client->id) }}"> Edit </a>
                  </div>
                  <form method="post" action="{{ route('customers.destroy', $client->id) }}">@csrf
                    @method('DELETE')
                    <!-- <input type="hidden"  value="{{ $client->id }}" name="product" /> -->
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
