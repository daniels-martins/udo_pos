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
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active"> Create a Product</li>
            <li class="breadcrumb-item active"> <a href="{{ route('products.index') }}"> View all Products</a></li>
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
          <div class="card card-primary ">
            <div class="card-header" data-card-widget="collapse">
              <h3 class="card-title">Add a Product</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div><!-- /.card-header -->
            <div class="card-body">
              <form class="form-horizontal" action={{ route("password.modify") }} method='post'> @csrf
                <div class=''>
                  {{-- current password field --}}
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <select class="form-control" id="prod_type" name='prod_type' placeholder="Select Product type">
                        <option value="default">Select Product type</option>
                        @foreach($prod_types as $val)
                        <option @if($val->id == 1) selected @endif value="{{ $val->id }}">{{ ucfirst($val->name)}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                    @error('prod_type')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="product_name" name='product_name' placeholder="Enter product name">

                    </div>
                    @error('product_name')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tag" name='tag' placeholder="Enter product tags">
                      <small class="text-info"> This helps in indexing and makes for a more efficient product searching
                        experience.</small>
                    </div>
                    @error('tag')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="category" name='category' placeholder="Enter product category">
                      <small class="text-info"> Dynamically add categories here.</small>
                    </div>
                    @error('category')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>


                  <div class="form-group row">
                    <div class="col-sm-10 d-flex">
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="qty" name='qty' placeholder="Enter quantity of product purchased or in stock">
                      </div>

                      <div class='col-sm-6'>
                        <select name="stock_alert_unit" id="stock_alert_unit" class='form-control'>
                          <option value="default" selected>Choose a product scale</option>
                          @foreach($measurement_scales as $val)
                          <option value="{{ $val->id }}">{{ $val->identity }}</option>
                          @endforeach
                        </select>
                      </div>

                    </div>

                    @error('qty')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>


                  <div class="form-group row">
                    <div class="col-sm-10">
                      <select name="store_name" id="store_name" class='form-control'>
                        <option value="default" selected>Select a Store</option>
                        @foreach($stores as $val)
                        <option value="{{ $val->id }}">{{ ucfirst($val->name) }}</option>
                        @endforeach
                      </select>
                    </div>
                    @error('store')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="desc" name='desc' placeholder="Enter product description">

                    </div>
                    @error('desc')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="status" name='status' placeholder="Is Product available? Yes or No">
                      use radio buttons here
                    </div>
                    @error('status')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- low qty alert--}}
                  <div class="form-group row">
                    <div class="col-sm-5">
                      <label for="alert_qty">Low stock quantity alert</label>
                      <input type="number" class="form-control" id="alert_qty" name='alert_qty' placeholder="Low quantity alert" value="40">
                      help: Select a numeric value, so that when this products gets to that quantity, you'll be
                      notified to go shopping for more items (low stock alert quantity)
                    </div>
                    <div class="col-sm-5">
                      <label for="stock_alert_unit">Unit of Measurement</label>
                      <select name="stock_alert_unit" id="stock_alert_unit" class='form-control'>
                        <option value="default" selected>Choose a product scale</option>
                        @foreach($measurement_scales as $val)
                        <option value="{{ $val->id }}">{{ $val->identity }}</option>
                        @endforeach
                      </select>
                      @error('alert_qty')
                      <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  {{-- low critical alert--}}
                  <div class="form-group row">
                    <div class="col-sm-5">
                      <label for="alert_qty">Low stock quantity alert <b class="text-danger">(Critical) </b> </label>
                      <input type="number" class="form-control" id="alert_qty" name='alert_qty' placeholder="Low quantity alert" value="40">
                      help: Select a numeric value, so that when this products gets to that quantity, you'll be
                      notified to go shopping for more items (low stock alert quantity)
                    </div>

                    <div class="col-sm-5">
                      <label for="critical_stock_alert_unit">Unit of Measurement
                        <b class="text-danger"> (Critical) </b>
                      </label>
                      <select name="critical_stock_alert_unit" id="critical_stock_alert_unit" class='form-control'>
                        <option value="default" selected>Choose a product scale</option>
                        @foreach($measurement_scales as $val)
                        <option value="{{ $val->id }}">{{ $val->identity }}</option>
                        @endforeach
                      </select>
                    </div>

                    @error('critical_alert_qty')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror

                  </div><!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary inline-block">Create Product</button>
                    <button type="button" onclick="history.go(-1)" class="btn btn-danger mx-5 float-right">
                      Cancel</button>
                    <button type="reset" class="btn btn-info inline-block ml-5 float-right">Reset</button>
                  </div><!-- /.card-footer -->
              </form>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div> <!-- /. card container-->

        <!-- Default box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Title</h3>

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
            {{-- @foreach($all_products as $product)
            {{ $product }}

            @endforeach --}}
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div><!-- /.card -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

@endsection
