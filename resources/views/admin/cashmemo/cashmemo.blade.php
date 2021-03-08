@extends('expert.master')

@section('title', 'cashmemo Manage - '.$settingsinfo->company_name.' - '.$settingsinfo->soft_name.'')

@section('content')

@include('expert.sidebar')

@include('expert.topbar')

<style type="text/css">
   @media print {
.noprint{
  display: none;
}
}
</style>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <?php if (session('message')): ?>
              <div class="alert alert-{{session('class')}} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert-icon contrast-alert"><i class="icon-close"></i></div>
                <div class="alert-message"><span>{{session('message')}}</span></div>
              </div>
        <?php endif; ?>

          <div class="card bg-dark">
      		<div class="card-header border-0  text-white" style="background-color: #3399FF;">
                <i class="fa fa-user-circle"></i><span> Cashmemo Manage</span>
            </div>

            <div class="card">
            <div class="card-header">

              <div style="display:inline-block; padding-top:5px;">
                <i class="fa fa-table"></i> Cashmemo List
              </div> 

              <div style="display:inline-block;float: right; padding-top:5px;">
                @if($user_role_per->add == 1)
                <a href="{{url('admin/cashmemo')}}" class="btn btn-dark">+add new Cashmemo</a>
                @endif
              </div> 

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr>
                      <b>
                       <th class="noprint" width="8%" class="text-center">Action</th>
                       <!--  <th width="5%">SN</th>
                        <th width="5%">Cashmemo Id</th> -->
                        <th>Date</th>
                        <th>Customer Name</th>
                        <!-- <th>Ship To</th> -->
                        <th>TT/Deposit</th>
                        <th>Miss. Dep.</th>
                        <th>Total</th>
                        <th>Prev. Due</th>
                        <th><b> Balance </b> </th>
                        </b>
                        
                       
                    </tr>
                </thead>
                <tbody>
                	@php $i=1; 
                  $setting = DB::table('settings')
                 ->first();
                     @endphp
                

             
              @foreach($cashmemo as $data)


                 
                    <tr>


                      <td class="noprint">
                       
                       <a href="#" class="btn btn-info btn-sm waves-effect waves-light"> 
                            <i class="fa fa-envelope"></i> <span> 
                          
                          </span>
                          </a> 


                        @if(in_array($data->id, $editable_ids))

                        @if($user_role_per->edit == 1)
                          
                            <a href="{{url('admin/editCashmemo/'.$data->cash_memo_id)}}" class="btn btn-success btn-sm waves-effect waves-light"> 
                            <i class="fa fa-edit"></i> <span> 
                          
                          </span>
                          </a> 

                        @endif

                        @if($user_role_per->delete == 1)

                          <a href="{{url('admin/dltcashmemo/'.$data->id)}}" id="delete" class="btn btn-danger btn-sm waves-effect waves-light"> 
                            <i class="fa fa-delete">X</i> <span> 
                          
                          </span>
                          </a> 
                          @endif
                          @endif
                        
                            <a href="{{url('admin/billprint/'.$data->cash_memo_id)}}" class="btn btn-warning btn-sm waves-effect waves-light"> 
                            <i class="fa fa-print"></i> <span> 
                       
                          </span>
                          </a>
                        
                          

                        </td>
                        <!-- <td>{{$i++}}</td>
                        <td>{{$data->cash_memo_id}}</td> -->
                        <td>{{ date("d-m-Y", strtotime($data->date)) }}</td>  
                        <td>{{$data->customer_name}}</td>
                     
                        <!-- <td>{{$data->ship_to}}</td>  -->
                        <td>{{$data->tt_deposit_balance}}</td>
                        <td>{{$data->missig_deposit_balance}}</td>
                        <td>{{$data->total}}</td>
                        <td>
                          @if($setting->cndition==0)

                       {{$data->Prev_due}}

                       @else
                       {{$data->f_prev_due}}
                       @endif
                          

                        </td> 

                        <td>
                           @if($setting->cndition==0)

                       {{$data->balance}}

                       @else
                       {{$data->f_balance}}
                       @endif
      
                          </td>
                      
                        
                        
                   </tr>
             @endforeach
                </tbody>
            </table>
            </div>
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
    $(document).ready(function() {
        dataTableLoad({
            curUrl: "{{route('Admin.userrole.index')}}",
            addUrl: "{{route('Admin.userrole.create')}}"
        });
    });
    </script>
  @endsection