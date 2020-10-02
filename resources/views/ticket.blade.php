@extends('main')
  
@section('content')
<div class="content-wrapper">

  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ticket Managemet
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Advanced Elements</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <!-- /.box-header -->
        <!-- form start -->

        <h3 class="box-title">Create Ticket</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>

      @if (count($errors) > 0)

      <div class="alert alert-danger" >

        <ul>
          @foreach ($errors ->all() as $error)

          <li>     {{$error}}        </li>

          @endforeach

        </ul>


      </div>


      @endif

      @if (\Session::has('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>  {{\Session::get('success')}} </h4>

      </div>

      @endif
      @if (\Session::has('error'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> {{\Session::get('error')}} </h4>

      </div>

      @endif
      <!-- /.box-header -->

      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <form role="form" id="regForm" method="post" action="{{URL::to('sendticket')}}">
            {{ csrf_field() }}
            <div class="col-md-6">
              <div class="form-group">
                <label>Choose Issue Category</label>
                <select class="form-control select2" name="category_id" id="provinces" style="width: 100%;" required>

                  <option value="" disable="true" selected="true">=== Select Category ===</option>
                  @foreach ($provinces as $value)
                  <option value="{{$value->id}}">{{ $value->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Description</label>
                <select class="form-control" name="description_id" id="regencies"  style="width: 100%;" required>
                  <option value="" disable="true" selected="true">=== Select Description ===</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Account Number</label>
                <input class="form-control" type="number" name="customer_number" id="customer_number" style="width: 100%;" required>
              </div>

              <div class="form-group">
                <label>Customer Name </label>
                <input class="form-control" type="text" name="cname" id="cname" style="width: 100%;" required>
              </div>

              <div class="form-group">
                <label>Customer Address </label>
                <input class="form-control"  name="caddress" id="caddress" style="width: 100%;" required>
              </div>

              <div class="form-group">
                <label>Transaction Account</label>
                <input class="form-control" type="number" name="taccount" id="taccount" style="width: 100%;" required>
              </div>


              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile" name="exampleInputFile">
              </div>

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">

              <div class="form-group">
                <label>Priority</label>
                <select class="form-control select2" id="priority" name="priority"
                style="width: 100%;">
                <option selected="selected" value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>

              </select>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label>Gender </label>
              <select class="form-control select2" name="gender" id="gender" style="width: 100%;">
                <option selected="selected">none</option>
                <option value="M">Gender</option>

                <option value="F">Female</option>

              </select>
            </div>

            <div class="form-group">
              <label>Phone Number:</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="text" name="pnumber" id="pnumber" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="email" name="cemail" id="cemail" style="width: 100%;">
            </div>


            <!-- /.form-group -->
          </div>




          <!-- /.col -->
        </div>


        <div class="box-header">
          <h3 class="box-title">Description
            <small>Issue Description</small>
          </h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
            title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">

          <textarea id="editor1" name="editor1"  rows="10" cols="80">

          </textarea>

        </div>






        <div class="box-footer">
          <button type="submit" name="register" id="register" class="btn btn-primary">Submit</button>
        </div>
      </form>

      <!-- /.row -->
    </div>
    <!-- /.box-body -->

  </div>
  <!-- /.box -->


  <!-- /.row -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.13
  </div>
  <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
  reserved.
</footer>
</div>
@endsection