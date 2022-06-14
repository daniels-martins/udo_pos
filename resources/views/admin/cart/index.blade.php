@php

@endphp
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
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">View Cart</li>
            <li class="breadcrumb-item active"> <a href="{{ route('pos') }}"> Add more items</a></li>


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
          <h3 class="card-title">Basket</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: auto;">
              <form action="{{ route('orders.store') }}" method="post" id="order_store">
                @csrf
                <div class="d-flex">
                  <input type="hidden" name='shipping_fee' value="20">
                  <input type="text" name="billing_name" class="form-control float-right" placeholder="Customer name">
                  <input type="text" name="billing_address" class="form-control float-right"
                    placeholder="Customer Address">
                  <input type="text" name="billing_phone" class="form-control float-right" placeholder="Customer Phone">
                  
                  <!-- Default switch -->
                  <div class="custom-control custom-switch ml-4">
                    <label class="custom-control-label" for="customSwitches"></label>
                    <input type="checkbox" class="custom-control-input " id="customSwitches" name='debtor'>
                  </div>

                </div>
              </form>


            </div>
          </div>
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
                <th style="">Unit Price (&#8358;) </th>
                <th style="">SubTotal (&#8358;) </th>
                <th style="">Stock</th>
                <th style="">Actions</th>

              </tr>
            </thead>
            {{-- {{ Product::all() }} --}}
            <tbody>
              {{-- an orderly numbering system for the cart items --}}
              @php $number = 1; @endphp

              @foreach($cart_items as $cart_item)
              <tr>
                <td> {{ $number }}</td>{{-- cart_item id --}}
                @php $number++; @endphp

                <td>{{ $cart_item->name }}</td>

                <td>{{ $cart_item->model->img ?? 'none: click to add' }}</td>
                {{-- look for this in the udo.js file // =========Update Cart============== --}}
                <td>
                  <input type="number" min="1" id='{{  $cart_item->rowId }}' name="update_cart"
                    value="{{ $cart_item->qty }}" style="width:80px;border:none;">
                </td>

                <td>{{ $cart_item->price }}</td>


                <td> <span id="item_subtotal_{{ $cart_item->rowId }}" class="text-success text-lg"> {{
                    number_format($cart_item->subtotal) }} </span></td>

                <td> <span id="eval_stock_{{ $cart_item->rowId }}" class="text-success text-xl">{{
                    $cart_item->model->qty - $cart_item->qty }} </span><span class="text-info"> ({{
                    $cart_item->model->qty }})</span></td>

                {{-- actions --}}
                <td style="cursor:progress" class="d-flex">
                  <div class="mr-1">
                  </div>
                  <form method="post" action="{{ route('cart.destroy', $cart_item->rowId) }}">
                    @csrf @method('DELETE')
                    <input class="btn btn-sm  btn-danger" type="submit" value="x">
                  </form>
                </td>

              </tr>
              @endforeach

            </tbody>
          </table>
          <div class="confirm_order float-right m-5">
            <button class="btn btn-primary" type="submit" form="order_store"> Confirm order </button>
          </div>

          <div class="confirm_order float-right m-5">
            <div class="text-info text-xl">
              Total : {{Cart::total() }}
            </div>
          </div>


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
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endpush