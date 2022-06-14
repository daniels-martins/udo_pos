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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"> <a href="{{ route('scales.create') }}">Create Measurement_scale</a></li>
            <li class="breadcrumb-item "> <a href="{{ route('scales.index') }}"> View All measurement_scales</a></li>
            

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
            <h3 class="card-title">Create a New Measurement_scale (for products)</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body col-sm-6">
            <form action="{{ route('scales.store') }}" method="post" id="measurement_scales_create"> @csrf
                <label for="name">Measurement_scale </label>
              <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" value="{{ old('name') }}" class="form-control" id="name" name='name' placeholder="Enter a name for this new Measurement_scale">
                    </div>
                    @error('name')
                    <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </form>
          </div><!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary inline-block" form="measurement_scales_create">Create Measurement_scale</button>
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