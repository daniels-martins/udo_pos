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
            <li class="breadcrumb-item active"> Edit Employee Info</li>
            <li class="breadcrumb-item"> <a href="{{ route('employees.index') }}"> View all Employees</a></li>
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

              <h3 class="card-title">Edit a Employee</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div><!-- /.card-header -->
            <div class="card-body">
              <form class="form-horizontal" action={{ route("employees.update", $employee->id) }} method='post'> @csrf
                @method('patch')
                {{-- Store --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <select name="store_warehouse_id" id="store_warehouse_id" class='form-control'>
                      <option value="" selected>Select a Store</option>
                      @foreach($stores as $val)
                      <option value="{{ $val->id }}" @if(old("store_warehouse_id")==$val->id or $employee->store_warehouse_id == $val->id)
                        selected
                        @endif>
                        {{ucfirst($val->name)}}</option>
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
                    <input type="text" value="{{ old('username') ?? $employee->username }}" class="form-control" id="name" name='username' placeholder="Enter Employee Name">
                  </div>
                  <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Employee Nick Name') }} <span class="text-danger text-lg">*</span> </div>
                  @error('username')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>
                {{-- first name field --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" value="{{ old('fname') ?? $employee->fname }}" class="form-control" id="fname" name='fname' placeholder="Enter Employee First Name">

                  </div>
                  <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Employee First Name') }}</div>
                  @error('fname')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                {{-- last name field --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" value="{{ old('lname') ?? $employee->lname}}" class="form-control" id="lname" name='lname' placeholder="Enter Employee Last Name">

                  </div>
                  <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Employee Last Name') }}</div>
                  @error('lname')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                {{-- email field --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="email" value="{{ old('email') ?? $employee->email }}" class="form-control" id="email" name='email' placeholder="Enter Employee email">

                  </div>
                  <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Employee email') }}</div>
                  @error('email')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                {{-- mobile phone --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" value="{{ old('mobile') ?? $employee->mobile }}" class="form-control" id="mobile" name='mobile' placeholder="Enter Employee Mobile Phone">

                  </div>
                  <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Employee Phone 1') }}</div>
                  @error('mobile')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" value="{{ old('mobile') ?? $employee->phone }}" class="form-control" id="phone" name='phone' placeholder="Enter Employee secondary phone number">

                  </div>
                  <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Employee Phone 2') }}</div>
                  @error('phone')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                {{-- shipping Address--}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" value="{{ old('shipping_address') ?? $employee->shipping_address}}" class="form-control" id="shipping_address" name='shipping_address' placeholder="Enter Employee Shop address">


                  </div>
                  <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Employee Shop Address') }}</div>
                  @error('shipping_address')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                {{-- billing address --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" value="{{ old('billing_address') ?? $employee->billing_address}}" class="form-control" id="billing_address" name='billing_address' placeholder="Enter Employee's House address">

                  </div>
                  <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Employee House Address') }}</div>
                  @error('billing_address')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>


                {{-- img --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    @if( $employee->img ) <img src="linkToImage.jpg" alt="employee_image.jpg" /> @endif
                    <input type="file" value="{{ old('img') }}" class="form-control" id="img" name='img' placeholder="Enter Employee image">
                  </div>
                  <div class="col-sm-10 ml-1 text-sm text-info">{{ __('Employee Image') }}</div>
                  @error('img')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                {{-- isdebtor --}}
                {{-- udo potential component for checkboxes --}}
                <div class="form-group row">
                  <div class="ml-2 mr-5 mt-1 col-sm-10">
                    <label class='inline-block mr-4'>Employee owes me money ? </label>
                  </div>
                  <div class="btn-group offset-md-1  btn-group-toggle" data-toggle="buttons">
                    <label class="btn bg-olive">
                      <input type="radio" name="is_debtor" id="is_debtor" autocomplete="off" value=1 />
                      True
                    </label>
                    <label class="btn bg-olive active">
                      <input type="radio" name="is_debtor" id="is_debtor" autocomplete="off" value=0 />
                      False
                    </label>
                  </div>
                  @error('Employee is currently owes me money ? ')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>


                {{-- note --}}
                <div class="form-group row">
                  <div class="col-sm-10">
                    <div><label for="notes">Notes for this employee : </label></div>
                    <textarea name="notes" id="notes" cols="40" rows="5" placeholder="Enter notes for this employee">{{ $employee->notes }}</textarea>
                  </div>
                  @error('billing_address')
                  <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                  @enderror
                </div>




                <div class="card-footer mt-5">
                  <button type="submit" class="btn btn-primary inline-block">Update Employee</button>
                  <button type="button" onclick="history.go(-1)" class="btn btn-danger mx-5 float-right">
                    Cancel</button>
                  <button type="reset" class="btn btn-info inline-block ml-5 float-right">Reset</button>
                </div><!-- /.card-footer -->
                {{-- in case of any errrors --}}
                @if($errors->any())
                {{ implode('', $errors->all('<div class="alert alert-danger">:message</div>')) }}
                @endif
              </form>
            </div><!-- /.card-body -->
          </div><!-- /.card primary -->
        </div> <!-- /. card container col-md-12-->
      </div> <!-- /.row -->
    </div><!-- /.container fluid -->

  </section><!-- /.content -->
</div>

@endsection

