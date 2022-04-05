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
          <!-- card container -->
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
              <form class="form-horizontal" action={{ route("products.store") }} method='post'> @csrf
                <div class=''>
                  {{-- current password field --}}
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <select class="form-control" id="prod_type_id" name='prod_type_id' placeholder="Select Product type">
                        <option value="">Select Product type</option>
                        @foreach($prod_types as $val)
                        <option @if($val->id == 1) selected @endif value="{{ $val->id }}">{{ ucfirst($val->name)}}
                        </option>
                        @endforeach
                      </select>
                      <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Select Product type') }}</div>

                    </div>
                    @error('prod_type_id')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input required type="text" value="{{ old('name') }}" class="form-control" id="name" name='name' placeholder="Enter product name">

                    </div>
                    <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Product name') }} <span class="text-danger text-lg">*</span> </div>

                    @error('name')

                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" value="{{ old('tags') }}" class="form-control" id="tags" name='tags' placeholder="Enter product tags">
                      <div class="text-info text-sm"> Product tags: This helps in indexing and makes for a more efficient product searching
                        experience.</div>
                    </div>
                    @error('tags')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10 d-flex">
                      <div class="col-sm-6">
                        <input type="text" value="{{ old('new_category_name') }}" class="form-control" id="new_category_name" name='new_category_name' placeholder="Enter name for this category of items">

                        <div class="text-info text-sm">Dynamically add categories here
                          @error('new_category_name')
                          <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class='col-sm-6'>
                        <select name="category_id" id="category_id" class='form-control'>
                          <option value="" selected>Select a product category</option>
                          @isset($categories)
                          @foreach($categories as $val)
                          <option value="{{ $val->id }}" {{ (old("category_id") == $val->id ? "selected":"") }}>
                            {{ $val->name }}
                          </option>
                          @endforeach
                          @endif
                        </select>
                        {{-- the label for the input select field above --}}
                        <div class="text-info text-sm ml-1">Product category
                          @error('category_id')
                          <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                    </div>
                  </div>
                  @error('new_category_name')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>


                {{-- new sone --}}

                <div class="form-group row">
                  <div class="col-sm-10 d-flex">
                    <div class="col-sm-6">
                      <input type="number" min='0' class="form-control" id="qty" name='qty' placeholder="Enter quantity of product in stock" value="{{ old('qty') }}" />
                      <div class="text-info text-sm">Quantity of product in stock.</div>

                    </div>


                    <div class='col-sm-6'>
                      <select name="measurement_scale_id" id="measurement_scale_id" class='form-control'>

                        <option value="" name="measurement_scale_id">Choose a product scale</option>
                        @foreach($measurement_scales as $val)
                        <option value="{{ $val->id }}" {{ (old("measurement_scale_id") == $val->id ? "selected":"") }}>
                          {{ $val->name }}
                        </option>

                        @endforeach
                      </select>
                      <div class="text-info text-sm">Product scale</div>
                    </div>
                  </div>
                  @error('measurement_scale_id')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>



                <div class="form-group row">
                  <div class="col-sm-10">
                    <select name="store_warehouse_id" id="store_warehouse_id" class='form-control'>
                      <option value="" selected>Select a Store</option>
                      @foreach($stores as $val)
                      <option value="{{ $val->id }}" {{ (old("store_warehouse_id") == $val->id ? "selected":"") }}>{{ ucfirst($val->name) }}</option>


                      @endforeach
                    </select>
                    <div class="text-info text-sm">Product Store</div>

                  </div>
                  @error('store_warehouse_id')

                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" value="{{ old('desc') }}" class="form-control" id="desc" name='desc' placeholder="Enter product description">
                    <div class="text-info text-sm">Product description</div>
                  </div>

                  @error('desc')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="row">
                  <div class="form-group mt-4 mb-5 col-sm-10 d-flex justify-content-sm-between">
                    <div class="ml-2 mr-5 mt-1"> <label class='inline-block mr-4'>Is product available ?</label> </div>
                    <div class="btn-group mr-4 btn-group-toggle" data-toggle="buttons">
                      <label class="btn bg-olive">
                        <input type="radio" name="status" id="yes" autocomplete="off" value="1" checked />
                        Yes
                      </label>
                      <label class="btn bg-olive active">
                        <input type="radio" name="status" {{-- @if(Auth::user()->sex == 'F') checked="" @endif name="sex"  --}} id="no" autocomplete="off" value="0" />
                        No
                      </label>
                      @error('status')
                      <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="btn-group col-sm-6 " data-toggle="buttons">
                      <div class="ml-5 mr-3 mt-2 d-flex"> Price <span class="text-danger text-lg">*</span> </div>
                      <input required type="number" min='0' class="form-control" id="price" name='price' placeholder="" value="{{ old('price') }}" />

                    </div>
                  </div>

                  @error('status')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                {{-- low qty alert--}}
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label for="low_stock_alert_qty">Low stock quantity alert</label>
                    <input type="number" min='0' class="form-control" id="low_stock_alert_qty" name='low_stock_alert_qty' placeholder="Low quantity alert" value="{{ old('low_stock_alert_qty')?? 40 }}" />

                    help: Select a numeric value, so that when this products gets to that quantity, you'll be
                    notified to go shopping for more items (low stock alert quantity)
                  </div>
                  <div class="col-sm-5">
                    <label for="low_qty_measurement_scale_id">Unit of Measurement</label>
                    <select name="low_qty_measurement_scale_id" id="low_qty_measurement_scale_id" class='form-control'>
                      <option value="" selected>Choose a product scale</option>
                      @foreach($measurement_scales as $val)
                      <option value="{{ $val->id }}" {{ (old("low_qty_measurement_scale_id") == $val->id ? "selected":"") }}>{{ $val->name }}</option>


                      @endforeach
                    </select>
                    @error('low_qty_measurement_scale_id')

                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                {{-- low critical alert--}}
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label for="critical_stock_alert_qty">Low stock quantity alert <b class="text-danger">(Critical) </b> </label>
                    <input type="number" min='0' class="form-control" id="critical_stock_alert_qty" name='critical_stock_alert_qty' placeholder="Critically Low quantity alert" value="40" value="{{ old('low_stock_alert_qty')?? 40 }}" />

                    help: Select a numeric value, so that when this products gets to that quantity, you'll be
                    notified to go shopping for more items (low stock alert quantity)
                  </div>
                  @error('critical_stock_alert_qty')


                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror


                  <div class="col-sm-5">
                    <label for="critical_qty_measurement_scale_id">Unit of Measurement
                      <b class="text-danger"> (Critical) </b>
                    </label>
                    <select name="critical_qty_measurement_scale_id" id="critical_qty_measurement_scale_id" class='form-control'>
                      <option value="" selected>Choose a product scale</option>
                      @foreach($measurement_scales as $val)
                      <option value="{{ $val->id }}" {{ (old("critical_qty_measurement_scale_id") == $val->id ? "selected":"") }}>{{ $val->name }}</option>

                      @endforeach
                    </select>
                  </div>

                  @error('critical_qty_measurement_scale_id')

                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror

                </div><!-- /.card-body -->

                <div class="card-footer mt-5">
                  <button type="submit" class="btn btn-primary inline-block">Create Product</button>
                  <button type="button" onclick="history.go(-1)" class="btn btn-danger mx-5 float-right">
                    Cancel</button>
                  <button type="reset" class="btn btn-info inline-block ml-5 float-right">Reset</button>
                </div><!-- /.card-footer -->
               
              </form>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div> <!-- /. card container-->
      </div> <!-- /.row -->
    </div> <!-- /.container fluid -->
  </section><!-- /. main content -->
</div><!-- /.content wrapper -->
@endsection
