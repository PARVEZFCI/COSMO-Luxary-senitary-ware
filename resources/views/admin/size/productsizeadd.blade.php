@extends('expert.master')

@section('title', 'Product Size Add - '.$settingsinfo->company_name.' - '.$settingsinfo->soft_name.'')

@section('content')

@include('expert.sidebar')

@include('expert.topbar')

<style type="text/css">

.table-responsive {
    white-space: normal;
}
.dataTables_length{
  display: none;
}
</style>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">

        <?php if (session('message')): ?>
        <div class="col-lg-12">
            <div class="alert alert-{{session('class')}} alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <div class="alert-icon contrast-alert"><i class="icon-close"></i></div>
              <div class="alert-message"><span>{{session('message')}}</span></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="col-lg-8">

          <div class="card bg-dark">
      		<div class="card-header border-0  text-white" style="background-color: #3399FF;">
                <i class="fa fa-list"></i><span>  Product Size </span>
            </div>

            <div class="card">
            <div class="card-header">
              <div style="display:inline-block; padding-top:5px;">
                <i class="fa fa-plus-circle"></i> Add New Product SIze 
              </div> 
            </div>
            
            <div class="card-body">

              <form action="{{url('admin/storeproductsize')}}" id="qcat" method="post">
              @csrf

              <div class="row">

                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="name"> Produt Type  </label>
                          <select class="form-control" id="product_type" name="product_type">
                          	<option>selet type</option>
                          	@foreach($type as $row)
                          	<option>{{$row->product_type_name}}</option>
                          	@endforeach
                          </select>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="name">Product Size </label>
                          <input required="" type="text" class="form-control" id="size" name="size" placeholder="Enter product Size">
                      </div>
                  </div>


                  

                  <div class="col-md-12">
                  </div>
                  
                  <div class="col-md-6">
                    <a href="{{url('admin/productsize')}}" class="btn btn-danger btn-block col-md-offset-2">
                      <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Back
                    </a>
                  </div>

                  <div class="col-md-6">
                    <button type="submit" class="btn btn-success btn-block col-md-offset-2">
                      <i class="fa fa-check-square-o"></i> Save
                    </button>
                  </div>

              </div>

            </form>

            </div>
          </div>
               
          </div>
        </div>

        

      </div><!--End Row-->
	  
       <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   

  @include('expert.copyright')

  @endsection

  @section('js')
    <script>
    

</script>


<script type="text/javascript">
  $(document).ready(function() {

    $("#product_type").select2();
   
   
});
</script>

  @endsection