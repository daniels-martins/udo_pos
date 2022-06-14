@extends('admin.layout.dashboard')

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
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
        <div class="col-6">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Results</h3>
            </div>
            <div class="card-body float-right">
              <div class="row" id="result" name='searchresult_top'>
              </div><!-- /.row -->
            </div><!-- /.card body -->

            <div class="card-footer">
              Footer
            </div><!-- /.card-footer-->
          </div><!-- /.card -->
        </div>



        {{-- other side --}}

        <div class="col-6">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cart</h3>
             </div>

            <div class="card-body">
              <div class=" mb-4 d-flex justify-content-between">
                <a href='{{ route("cart.index") }}'><button class="btn btn-success">Checkout</button></a>
              
                <form method="post" action='{{ route("cart.destroy", ['row_id' => 0] ) }}'> @method('DELETE') @csrf
                    <button class="btn btn-danger" type="sumbit" >Empty cart</button>
  
  
                </form>
              </div>
             

              <div class="row" id="cart" name='cart'>
                <hr>
                @foreach (Cart::content() as $item)
                <div class="card m-3" style="width: 9rem;" name='{{ $item->rowId }}'>
                  <img class="card-img-top img-custom-size" src='/adminlte/dist/img/prod-4.jpg' alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">
                      <label for="{{  $item->rowId }}">Qty
                        <input type="number" min="1" id='{{  $item->rowId }}' name="update_cart"
                          value="{{  $item->qty }}" style="width:60px;border:none;">
                      </label>
                      <span>&#8358; {{ $item->price }}</span>
                      <a class="btn inline-block float-right " onclick="rm_4rmCart(event, this.id, this.name)"
                        id='{{ $item->rowId }}' name='{{ $item->name }}' data_id='{{ $item->id }}'>
                        <i class="fa fa-trash text-danger" sr-only='remove from cart' title='remove from cart'></i>
                      </a>

                    </p>
                  </div>
                </div>
                @endforeach

                {{-- @endforeach --}}
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