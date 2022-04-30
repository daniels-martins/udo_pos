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
            <li class="breadcrumb-item active"> <a href="{{ route('stores.create') }}">Create Store</a></li>
            <li class="breadcrumb-item "> <a href="{{ route('stores.index') }}"> View All Stores</a></li>
            

          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Default box -->
        <div class="card card-primary col-sm-12">
          <div class="card-header">
            <h3 class="card-title">Create a New Store (for products)</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body col-sm-6">
            <form action="{{ route('stores.update', $store->id) }}" method="post" id="stores_update"> @csrf @method('PATCH')
              <label for="name" class="col-form-label-sm">Store Name <span class="text-danger text-lg">*</span></label>
              <div class="form-group row">
                <div class="col-sm-10">
                  <input type="text" value="{{ old('name') ?? $store->name}}" class="form-control" id="name" name='name' placeholder="Enter a name for this new Store">
                </div>
                @error('name')
                <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                @enderror
              </div>


              <label for="name" class="col-form-label-sm">Store Address <span class="text-danger text-lg">*</span></label>
              <div class="form-group row">

                <div class="col-sm-10">
                  <input type="text" value="{{ old('address') ?? $store->address}}" class="form-control" id="address" name='address' placeholder="Enter store address">
                </div>
                @error('address')
                <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                @enderror
              </div>
                

              <label for="name" class="col-form-label-sm">Store description</label>
              <div class="form-group row">
                <div class="col-sm-10">
                  <textarea  class="form-control" id="desc" name='desc' placeholder="Enter a description for this store">{{ old('desc') ?? $store->desc}}</textarea>
                </div>
                @error('desc')
                <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                @enderror
              </div>

                  <br><br><b>optional</b>
                  <div class="form-group mt-3 mb-3 col-sm-10 d-flex">
                    <div class="ml-2 mr-1 mt-1"> <label class='inline-block col-form-label-sm mr-4'>Is this store active ?</label> </div>
                    <div class="btn-group mr-1 btn-group-toggle" data-toggle="buttons">
                      <label class="btn bg-olive">
                        <input type="radio" name="status" id="yes" autocomplete="off" value="1" @if($store->status) checked @endif/>
                        Yes
                      </label>
                      <label class="btn bg-olive @unless($store->status) inactive @endif">
                        <input type="radio" name="status" id="no" autocomplete="off" value="0" @unless($store->status) checked @endunless/>
                        No
                      </label>
                      @error('status')
                      <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    
                  </div>

              <label for="name">Store (Country) </label>
              <div class="form-group row">
                <div class="col-sm-10">
                  <select name="country_id" id="country_id" class='form-control'>
                    <option value="" selected>Select</option>
                    @foreach($countries as $country)
                    <option value="{{ old("country_id") ?? $country->id }}" {{ ($store->country_id == $country->id ? "selected":"") }}>
                      {{ $country->name }}
                    </option>
                    @endforeach
                  </select>


                </div>
                @error('country')
                <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                @enderror
              </div>

            </form>
          </div><!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary inline-block" form="stores_update">Update Store</button>
            <button type="button" onclick="history.go(-1)" class="btn btn-danger mx-5 float-right">
              Cancel</button>
            <button type="reset" class="btn btn-info inline-block ml-5 float-right">Reset</button>
            </div><!-- /.card-footer -->
        </div><!-- /.card -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection