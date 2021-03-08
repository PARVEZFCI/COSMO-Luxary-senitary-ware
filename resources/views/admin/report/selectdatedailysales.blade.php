@extends('expert.master')

@section('title', 'Daily Sales Statement  - '.$settingsinfo->company_name.' - '.$settingsinfo->soft_name.'')

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

        <div class="col-lg-10">

          <div class="card bg-dark">
      		<div class="card-header border-0  text-white" style="background-color: #3399FF;">
                <i class="fa fa-list"></i><span> Daily Sales Statement </span>
            </div>

            <div class="card">
            <div class="card-header">
              <div style="display:inline-block; padding-top:5px;">
                <i class="fa fa-plus-circle"></i> Select Date 
              </div> 
            </div>
            
            <div class="card-body">

              <form action="{{url('admin/dailysalestatment')}}" id="qcat" method="post">
             @csrf

              <div class="row">

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="name"> Select Year  </label>
                          <input type="date" name="date" class="form-control"  />
                          
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                        <br>   
                         <button class="btn btn-dark btn-block col-md-offset-2"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> View Result</button>
                      </div>
                  </div>
                  <div class="col-md-3">
                  	<div class="form-group">
                  		<br>
                  	
                     <!--  <button type="submit" > -->
                      <!-- <a href="{{url('admin/yearlysalesstatement')}}" class="btn btn-dark btn-block col-md-offset-2"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> View Result</a> -->
                        <!-- </button> -->
                   
                    </div>
                 </div>


                  

                  <div class="col-md-12">
                  </div>
                  
                 <!--  <div class="col-md-6">
                    <a href="{{url('admin/productsize')}}" class="btn btn-dark btn-block col-md-offset-2">
                      <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Back
                    </a>
                  </div>

                  <div class="col-md-6">
                    <button type="submit" class="btn btn-dark btn-block col-md-offset-2">
                      <i class="fa fa-check-square-o"></i> Save
                    </button>
                  </div>
 -->
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

  @endsection