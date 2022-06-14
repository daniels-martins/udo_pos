@extends('admin.layout.dashboard')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="card card-primary">
          <!-- form start -->
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Product Create</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item ">
                    <a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item ">
                    <a href="{{ route('products.index') }}">Products</a>
                  </li>
                  <li class="breadcrumb-item active">
                    Product Create
                  </li>

                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- card container -->
          <div class="card card-primary ">
            <!-- card-header -->
            <div class="card-header" data-card-widget="collapse">
              <h3 class="card-title">Add a Product</h3>
              <!-- card-tools -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div><!-- /.card-tools -->
            </div><!-- /.card-header -->


            <div class="card-body">
              <form class="row" action={{ route("products.store") }} method='post'> @csrf
                <!-- part A -->
                <div class='col-md-2 mr-5'>

                  <div class="form-group">
                    <div class="text-sm"> <label for="store_warehouse_id">Product Store</label><span
                        class="text-danger text-lg">*</span></div>

                    <select name="store_warehouse_id" id="store_warehouse_id" class='form-control'>
                      <option value="" selected>Select a Store</option>
                      @foreach($stores as $val)
                      <option value="{{ $val->id }}" {{ (old("store_warehouse_id")==$val->id ? "selected":"") }}>{{
                        ucfirst($val->name) }}</option>
                      @endforeach
                    </select>

                    @error('store_warehouse_id')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror

                  </div>


                  {{-- prod_type field --}}
                  <div class="form-group">
                    <div> <label for="prod_type_id">Product type</label><span class="text-danger text-lg">*</span>
                    </div>

                    <select class="form-control" id="prod_type_id" name='prod_type_id'
                      placeholder="Select Product type">
                      <option value="">Select Product type</option>
                      @foreach($prod_types as $val)
                      <option @if($val->id == 1) selected @endif value="{{ $val->id }}">{{ ucfirst($val->name)}}
                      </option>
                      @endforeach
                    </select>

                    <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Select Product type') }}</div>

                    @error('prod_type_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                  </div>

                  <div class="form-group">
                    <div class="text-sm"> <label for="name">Product name </label><span
                        class="text-danger text-lg">*</span> </div>
                    <input required type="text" value="{{ old('name') }}" class="form-control" id="name" name='name'
                      placeholder="Enter product name">

                    @error('name')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block"> <label for="price">Selling Price</label><span
                        class="text-danger text-lg">*</span> </div>
                    <div>
                      <input required type="number" min='0' class="form-control" id="price" name='price' placeholder=""
                        value="{{ old('price') }}" />
                    </div>
                  </div>
                </div>

                <!-- part B -->
                <div class="col-md-4 mr-5">

                  <!-- form group -->
                  {{-- low qty alert--}}
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="new_category_name">Create New Category</label><span
                      class="text-danger text-lg">*</span>
                      <input type="text" value="{{ old('new_category_name') }}" class="form-control  @error('category_id') border-danger @enderror"
                        id="new_category_name" name='new_category_name'
                        placeholder="Enter a name for this category of items" /> 

                      <div class="text-info text-sm d-none">Dynamically add categories here</div>
                      @error('category_id')
                      <div class="col-sm-12 text-danger text-sm">{{ 'Please provide a new category' }}</div>
                      @enderror
                    </div>
                    <div class="col-md-1 mt-5">OR</div>


                    <div class="col-sm-5">
                      <label for="category_id">Product category</label><span
                      class="text-danger text-lg">*</span>
                      <select name="category_id" id="category_id" class='form-control @error("category_id") border-danger @enderror'>
                        <option value="" selected>Choose a category</option>
                        @isset($categories)
                        @foreach($categories as $val)
                        <option value="{{ $val->id }}" {{ (old("category_id")==$val->id ? "selected":"") }}>
                          {{ $val->name }}
                        </option>
                        @endforeach
                        @endisset
                      </select>
                      @error('category_id')
                      <div class="col-sm-12 text-danger text-sm">{{ 'Select a category' }}</div>
                      @enderror
                    </div>
                  </div>


                  <!-- form group -->
                  {{-- low qty alert--}}
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="low_stock_alert_qty">Stock Qty</label>
                      <input type="number" min='0' class="form-control" id="qty" name='qty'
                        placeholder="Enter quantity of product in stock"
                        value="{{ old('low_stock_alert_qty')?? 40 }}" />

                      <div class="d-none">
                        Quantity of product in stock
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label for="low_qty_measurement_scale_id">Scale</label>
                      <select name="measurement_scale_id" id="measurement_scale_id" class='form-control'>
                        <option value="" selected>Choose a product scale</option>
                        @foreach($scales as $val)
                        <option value="{{ $val->id }}" {{ (old("measurement_scale_id")==$val->id ?
                          "selected":"")
                          }}>{{ $val->name }}</option>
                        @endforeach
                      </select>

                      @error('measurement_scale_id')
                      <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <!-- form group -->
                  {{-- low qty alert--}}
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="low_stock_alert_qty">Alert Qty</label>
                      <input type="number" min='0' class="form-control" id="low_stock_alert_qty"
                        name='low_stock_alert_qty' placeholder="Low quantity alert"
                        value="{{ old('low_stock_alert_qty')?? 40 }}" />

                      <div class="d-none">
                        help: Tooltip Select a numeric value, so that when this products gets to that quantity, you'll
                        be
                        notified to go shopping for more items (low stock alert quantity)
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="low_qty_measurement_scale_id">Scale</label>
                      <select name="low_qty_measurement_scale_id" id="low_qty_measurement_scale_id"
                        class='form-control'>
                        <option value="" selected>Choose a product scale</option>
                        @foreach($scales as $val)
                        <option value="{{ $val->id }}" {{ (old("low_qty_measurement_scale_id")==$val->id ?
                          "selected":"")
                          }}>{{ $val->name }}</option>


                        @endforeach
                      </select>
                      @error('low_qty_measurement_scale_id')

                      <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <!-- form group -->
                  {{-- low critical alert--}}
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="critical_stock_alert_qty">Alert Qty <b class="text-danger">(XX)
                        </b> </label>
                      <input type="number" min='0' class="form-control" id="critical_stock_alert_qty"
                        name='critical_stock_alert_qty' placeholder="Critically Low quantity alert" value="40"
                        value="{{ old('low_stock_alert_qty')?? 40 }}" />

                      <div class="d-none">help: Select a numeric value, so that when this products gets to that
                        quantity, you'll be
                        notified to go shopping for more items (low stock alert quantity)</div>
                    </div>
                    @error('critical_stock_alert_qty')


                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror


                    <div class="col-sm-6">
                      <label for="critical_qty_measurement_scale_id">Scale </b></label>
                      <select name="critical_qty_measurement_scale_id" id="critical_qty_measurement_scale_id"
                        class='form-control'>
                        <option value="" selected>Choose a product scale</option>
                        @foreach($scales as $val)
                        <option value="{{ $val->id }}" {{ (old("critical_qty_measurement_scale_id")==$val->id ?
                          "selected":"") }}>{{ $val->name }}</option>

                        @endforeach
                      </select>
                    </div>

                    @error('critical_qty_measurement_scale_id')

                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror

                  </div><!-- /.card-body -->


                  {{-- <div class="card-footer mt-5">
                    <button type="submit" class="btn btn-primary inline-block">Create Product</button>
                    <button type="button" onclick="history.go(-1)" class="btn btn-danger mx-5 float-right">
                      Cancel</button>
                    <button type="reset" class="btn btn-info inline-block ml-5 float-right">Reset</button>
                  </div><!-- /.card-footer --> --}}
                </div> <!-- part B -->

                <!-- part c -->
                <div class="col-md-4">
                  <div class="form-group">
                    <div><label class='inline-block mr-4'>Product description</label></div>
                    <div class="">
                      <textarea type="text" value="{{ old('desc') }}" class="form-control" id="desc" name='desc'
                        placeholder="Enter product description"></textarea>
                      <div class="text-info text-sm">Product description</div>
                    </div>

                    @error('desc')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="form-group mt-4 mb-5 col-sm-10 d-flex justify-content-sm-between">
                      <div class="ml-2 mr-5 mt-1"> <label class='inline-block mr-4'>Is product available ?</label>
                      </div>
                      <div class="btn-group mr-4 btn-group-toggle" data-toggle="buttons">
                        <label class="btn bg-olive">
                          <input type="radio" name="status" id="yes" autocomplete="off" value="1" checked />Yes 
                        </label>
                        <label class="btn bg-olive active">
                          <input type="radio" name="status" {{-- @if(Auth::user()->sex == 'F') checked="" @endif
                          name="sex" --}} id="no" autocomplete="off" value="0" />No
                        </label>
                        @error('status')
                        <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                    </div>

                    @error('status')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="card-footer mt-5">
                    <button type="submit" class="btn btn-primary inline-block">Create Product</button>
                    <button type="button" onclick="history.go(-1)" class="btn btn-danger mx-5 float-right">
                      Cancel</button>
                    <button type="reset" class="btn btn-info inline-block ml-5 float-right ">Reset</button>
                  </div><!-- /.card-footer -->
                </div>




              </form>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div> <!-- /. card container-->
      </div> <!-- /.row -->
    </div> <!-- /.container fluid -->
  </section><!-- /. content -->
</div><!-- /.content wrapper -->
@endsection