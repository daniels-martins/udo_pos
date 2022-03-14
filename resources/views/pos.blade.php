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
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Title</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
                <div class="row" id="result" name='searchresult_top' >

                  {{-- @for($i = 0; $i < 10; $i++) <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-info"> <i class="fa fa-shopping-basket"></i></span>

                      <div class="info-box-content">

                        <span class="info-box-text h5">Purchase</span>
                        <span class="info-box-number font-weight-normal text-lg">410 items @ N333,430</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div> --}}
                {{-- @endfor --}}
              </div><!-- /.row -->
            </div><!-- /.card body -->


            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="..." alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>


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
  function add2cart() {
    alert('added')
  }
  $('#q').on('change', function(e) {
    $('.add2cart').on('click', function() {
      {
        {
          --grab the id--
        }
      }
      alert(this.getAttribute('data-id'))

      {
        {
          --add it to cart--
        }
      }
    })
  })

</script>
@endpush

@section('script')
@endsection
