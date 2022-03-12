@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
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
              <h3 class="card-title">Modify Product</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div><!-- /.card-header -->
            <div class="card-body">
              <form class="form-horizontal" action={{ route("products.update", $product->id) }} method='post'>@csrf
                @method('PATCH')
                <div class=''>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <select class="form-control" id="prod_type" name='prod_type' placeholder="Select Product type">
                        <option value="">Select Product type</option>
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
                      <input type="text" class="form-control" id="name" name='name' placeholder="Enter product name"
                        value="{{ $product->name }}" />
                    </div>
                    @error('name')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tags" name='tags' placeholder="Enter product tags"
                        value='{{ $product->tags }}'>
                      <small class="text-info"> This helps in indexing and makes for a more efficient product searching
                        experience.</small>
                    </div>
                    @error('tag')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="category" name='category'
                        placeholder="Enter product category" value='{{ $product->tags }}' />

                      <small class="text-info"> Dynamically add categories here.</small>
                    </div>
                    @error('category')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10 d-flex">
                      <div class="col-sm-6">
                        <input type="number" min='0' class="form-control" id="qty" name='qty'
                          placeholder="Enter quantity of product purchased or in stock" value='{{ $product->qty }}'>

                      </div>

                      <div class='col-sm-6'>
                        <select name="stock_alert_unit" id="stock_alert_unit" class='form-control'>
                          <option value="" selected>Choose a product scale</option>
                          @foreach($measurement_scales as $val)
                          <option value="{{ $val->id }}">{{ $val->name }}</option>
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
                      <select name="store_warehouse_id" id="store_warehouse_id" class='form-control'>
                        <option value="" selected>Select a Store</option>
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
                      <input type="text" class="form-control" id="desc" name='desc'
                        placeholder="Enter product description">

                    </div>
                    @error('desc')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- <div class="form-group row">
                    <div class="col-sm-12 mt-3 mb-3">
                      <div class="btn-group col-sm-5 btn-group-toggle" data-toggle="buttons">
                        <div class="mr-3 mt-1"> Product Availability ?</div>
                        <label class="btn bg-olive">
                          <input type="radio" name="options" id="yes" autocomplete="off" value="yes" checked="">
                          Yes product is available
                        </label>
                        <label class="btn bg-olive active">
                          <input type="radio" name="options" id="no" autocomplete="off" value="no">
                          No product is not available
                        </label>
                      </div>
                      <div class="btn-group col-sm-5 " data-toggle="buttons">
                        <div class="ml-5 mr-3 mt-2"> Price</div>

                        <input type="number" min='0' class="form-control" id="price" name='price' placeholder=""
                          value="{{ $product->price}}" />
                      </div>
                    </div>
                    @error('status')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div> -->

                  <div class="row">
                    <div class="form-group my-4 col-sm-10 d-flex justify-content-sm-between">

                      <div class="ml-2 mr-5"> <label class='inline-block mr-4'>Is product available ?</label> </div>
                      <div class="btn-group mr-4 btn-group-toggle" data-toggle="buttons">
                        <label class="btn bg-olive">
                          <input type="radio" {{-- @if(! in_array(Auth::user()->sex, ['M', 'F']) ) checked=""
                          @elseif(Auth::user()->sex == 'M') checked=""
                          @endif  --}} name="status" id="yes" autocomplete="off" value="1" />
                          Yes
                        </label>
                        <label class="btn bg-olive active">
                          <input type="radio" {{-- @if(Auth::user()->sex == 'F') checked="" @endif name="sex"  --}} id="no" autocomplete="off" value="0" />
                          No
                        </label>
                        @error('sex')
                        <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="btn-group col-sm-6 " data-toggle="buttons">
                        <div class="ml-5 mr-3 mt-2"> Price</div>

                        <input type="number" min='0' class="form-control" id="price" name='price' placeholder="" />
                      </div>
                    </div>

                    @error('status')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  {{-- low qty alert--}}
                  <div class="form-group row">
                    <div class="col-sm-5">
                      <label for="alert_qty">Low stock quantity alert</label>
                      <input type="number" min='0' class="form-control" id="alert_qty" name='alert_qty'
                        placeholder="Low quantity alert" value="40">
                      help: Select a numeric value, so that when this products gets to that quantity, you'll be
                      notified to go shopping for more items (low stock alert quantity)
                    </div>
                    <div class="col-sm-5">
                      <label for="stock_alert_unit">Unit of Measurement</label>
                      <select name="stock_alert_unit" id="stock_alert_unit" class='form-control'>
                        <option value="" selected>Choose a product scale</option>
                        @foreach($measurement_scales as $val)
                        <option value="{{ $val->id }}">{{ $val->name }}</option>
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
                      <input type="number" min='0' class="form-control" id="alert_qty" name='alert_qty'
                        placeholder="Low quantity alert" value="40">
                      help: Select a numeric value, so that when this products gets to that quantity, you'll be
                      notified to go shopping for more items (low stock alert quantity)
                    </div>

                    <div class="col-sm-5">
                      <label for="critical_stock_alert_unit">Unit of Measurement
                        <b class="text-danger"> (Critical) </b>
                      </label>
                      <select name="critical_stock_alert_unit" id="critical_stock_alert_unit" class='form-control'>
                        <option value="" selected>Choose a product scale</option>

                        @foreach($measurement_scales as $val)
                        @if($val == $product->measurement_scale_id)
                        {{ dd('we did it') }}
                        @endif
                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    @error('critical_alert_qty')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror

                  </div><!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary inline-block">Update Product</button>
                    <button type="button" onclick="history.go(-1)" class="btn btn-danger mx-5 float-right">
                      Cancel</button>
                    <button type="reset" class="btn btn-warning inline-block ml-5 float-right">Reverse Changes</button>

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
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
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
@section('script')

@endsection


@push('child-scripts')

@endpush