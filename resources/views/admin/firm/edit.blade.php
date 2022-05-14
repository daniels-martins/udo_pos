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
            <li class="breadcrumb-item active"> Modify Your Company Data</li>
            <li class="breadcrumb-item "> <a href="{{ route('firms.show', $company->id) }}"> View My company</a>
            </li>
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
            <h3 class="card-title">Modify Company (for products)</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body col-sm-6">
            <form action="{{ route('firms.update', $company->id) }}" method="post" id="company_update"> @csrf
              @method('patch')
              <label for="name">Company Name</label>
              <div class="form-group row">
                <div class="col-sm-10">
                  <input type="text" value="{{ old('name') ?? $company->name }}" class="form-control" id="name"
                    name='name' placeholder="{{ old('name') ?? $company->name }}">
                </div>
                @error('name')
                <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                @enderror
              </div>

              <label for="name">Company CEO</label>
              <div class="form-group row">
                {{-- the Auth::user() === $company->user() --}}
                <div class="col-sm-10">
                  <input type="disabled" value="{{ old('ceo') ?? $company->user->fullname() }}" class="form-control"
                    disabled id="name" name='user'>
                </div>
                @error('user')
                <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                @enderror
              </div>

              <label for="name">Company Head Office Address</label>
              <div class="form-group row">
                <div class="col-sm-10">
                  <input type="text" value="{{ old('head_office') ?? $company->head_office }}" class="form-control"
                    id="head_office" name='head_office' placeholder="{{ old('head_office') ?? $company->head_office }}">
                </div>
                @error('head_office')
                <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                @enderror
              </div>

              <label for="name">Company Phone</label>
              <div class="form-group row">
                <div class="col-sm-10">
                  <input type="text" value="{{ old('phone') ?? $company->phone }}" class="form-control" id="phone"
                    name='phone' placeholder="{{ old('phone') ?? $company->phone }}">
                </div>
                @error('phone')
                <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                @enderror
              </div>

              <label for="name">Company Email</label>
              <div class="form-group row">
                <div class="col-sm-10">
                  <input type="text" value="{{ old('email') ?? $company->email }}" class="form-control" id="email"
                    name='email' placeholder="{{ old('email') ?? $company->email }}">
                </div>
                @error('email')
                <div class="col-sm-10 ml-1 text-danger">{{ $message }}</div>
                @enderror
              </div>

            </form>

          </div>
        </div><!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary inline-block" form="company_update">Update Company</button>
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