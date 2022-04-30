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
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">POS</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Results</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body float-right">
              <a  href='{{ route("cart.index") }}'><button class="btn btn-success">Checkout</button></a>
                <div class="row" id="result" name='searchresult_top'>
              </div><!-- /.row -->
            </div><!-- /.card body -->


            <div class="card-body" >
              <div class="row" id="cart" name='cart'>
                @foreach (Cart::content() as $item)
            <div class="card m-3" style="width: 18rem;" name='{{$item->rowId}}'>
              <img class="card-img-top" src='/adminlte/dist/img/prod-4.jpg' alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text">Some fixed [{{$item->rowId}}] example text to build on the card title and make up the bulk of the card's content.</p>
                <a class="btn btn-warning" onclick="rm_4rmCart(this.id, this.name)" id='{{$item->rowId}}' name='{{$item->name}}' data_id='{{$item->rowId}}'>Remove from basket</a>
              </div>
            </div> 
            @endforeach
            </div><!-- /.row -->
          </div><!-- /.card body -->



          <div class="card-footer">
            Footer
          </div><!-- /.card-footer-->
        </div><!-- /.card -->
      </div>
    </div>
</div>
</section><!-- /.content -->
</div>

@endsection
@push('child-scripts')
<script>

</script>
@endpush

@section('script')
@endsection
