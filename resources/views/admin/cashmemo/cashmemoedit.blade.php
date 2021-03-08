@extends('expert.master')

@section('title', 'Cash-memo -'.$settingsinfo->company_name.' - '.$settingsinfo->soft_name.'')

@section('content')

<style type="text/css">
  input {
    text-align: center;
  }
</style>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

 <div id="wrapper" class="toggled">
@include('expert.sidebar')

@include('expert.topbar')

<div class="clearfix"></div>
    
  <div class="content-wrapper">
    <div class="container-fluid">

      <div id="warning">
        
      </div>

      <?php if (session('message')): ?>
      <div class="col-lg-12" >
          <div class="alert alert-{{session('class')}} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <div class="alert-icon contrast-alert"><i class="icon-close"></i></div>
            <div class="alert-message"><span>{{session('message')}}</span></div>
          </div>
      </div>
      <?php endif; ?>

      <form id="purchase" action="{{url('admin/updatecashmemo')}}" method="post">
           @csrf
      <div class="row">
        <div class="col-lg-12">
          <div class="card bg-dark">
            <div class="card-header border-0 bg-transparent text-white">
                <i class="fa fa-university"></i><span> Cash Memo Edit </span>
            </div>

            <div class="card">

            <div class="card-header">
              <div style="">
                <i class="fa fa-cart-plus"></i> Cash Memo  
              </div> 
            </div>
    <h4 class="text-center pt-3">Select Customer</h4><hr>

       <div class="card-body">

          <div class="row">
           <input type="hidden" name="cashmemo" id="cashmemo" value="{{$bill_edit->cash_memo_id}}">
             
                <div class="col-md-6">
                  <div class="form-group">
                      
                  </div>
                </div>

            <div class="col-md-3"></div>
               
               <div class="col-md-3">
                  <div class="form-group">
                    <?php
                        $date = new DateTime();
                        $date->modify('-1 day');
                       
                    ?>
                    <input class="form-control" type="date" id="date" value="{{$bill_edit->date}}" name="date" placeholder="Date">
                  </div>
                </div>

                

        </div> <!-- end row -->
                

        <div id="show_customer">
         <div class="row">

              <div class="col-md-3">
               <div class="form-group">
                   <label>Customer Name</label>

                   {{$bill_edit->customer_code}}
                    <select class="form-control" id="customer_code" name="customer_code">
                      
                        <option value="{{$bill_edit->customer_code}}" >{{$bill_edit->customer_code}} </option>
                         
                            <option value="">
                              
                            </option>
                          
                       
                    </select>
                  </div>

              </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Customer Name</label>
                    <input class="form-control" type="text" id="customer_name" name="customer_name" placeholder="Customer  Name" value="{{$bill_edit->customer_name}}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Customer Address</label>
                    <input class="form-control"  value="{{$bill_edit->customer_address}}" type="text" id="customer_address" name="customer_address" placeholder="Customer Address ">
                  </div>
                </div>

          
                  
                    <input class="form-control" type="hidden" value="{{$bill_edit->customer_phone}}" id="customer_phone" name="customer_phone" placeholder="Customer Phone ">
                
               
               <div class="col-md-2">
                  <div class="form-group">
                    <label>Ship To</label>
                    <input class="form-control" type="text" value="{{$bill_edit->ship_to}}" id="ship_to" name="ship_to" placeholder="Ship  To ">
                  </div>
                </div>

                 <div class="col-md-2">
                  <div class="form-group">
                    <label>Truck No.</label>
                    <input class="form-control" value="{{$bill_edit->truck_no}}" type="text" value="0" id="truck_no" name="truck_no" placeholder="Truck No ">
                  </div>
                </div>

        </div> <!-- end row -->
     </div>
<hr>


    <h4 class="text-center">Select Product</h4><hr>
     <div class="row">

            <div class="col-md-12">
                  <div class="form-group">
                    <label for="category_id">Product Code </label>
                    <select class="form-control" id="product_code" name="product_code">
                        <option value="">Select Product Code </option>
                            @foreach($product as $data)
                            <option value="{{$data->id}}">
                              {{$data->product_code}} / {{$data->grade}}
                            </option>
                            @endforeach
                       
                    </select>
                  </div>
            </div>

     </div> <!-- end row -->

     

     <div id="show_medicine_select">
             <div class="row">

             <input type="hidden" name="id" id="id">           
                  <div class="col-md-2">
                  <div class="form-group">
                    <label for="category_id">Product Type </label>
                    <input class="form-control" type="text" id="product_type" name="product_type" placeholder="produt  type">
                  </div>
                </div>
                
                 <div class="col-md-2">
                  <div class="form-group">
                    <label for="category_id">Product Name </label>
                    <input class="form-control" type="text" id="product_name" name="product_name" placeholder="produt  Name">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="category_id">Product Code </label>
                    <input class="form-control" type="text" id="product_codes" name="product_codes" placeholder="produt  type">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="category_id">Product Grade </label>
                     <input class="form-control" type="text" id="grade" name="grade" placeholder="Grade ">
                    <!-- <select name="grade" class="form-control">

                      <option>Select grade</option>
                    </select> -->
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="category_id">Product specification </label>
                    <input class="form-control" type="text" id="product_specification" name="product_specification" placeholder="product_specification" >
                  </div>
                </div>

                 <div class="col-md-2">
                  <div class="form-group">
                    <label for="category_id">Ctn./Pcs.</label>
                    <input class="form-control" type="number" id="qty" name="quantity" placeholder="quantity">
                  </div>
                </div>

             


                <div class="col-md-2">
                  <div class="form-group">
                    <label for="category_id">Rate </label>
                    <input class="form-control" type="text" id="unit_price" name="unit_price" placeholder="Unit Price">
                  </div>
                </div>
                

                <div class="col-md-2">
                    <div class="form-group">

                      <label>Comission</label>
                      <input type="text" name="comission" id="comission" class="form-control" placeholder="Entr Comission">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">

                      <label>Quantity/SQF</label>
                      <input type="text" name="quantity_per_sqf" value="0" id="quantity_per_sqf" class="form-control" placeholder="Entr Comission">
                    </div>
                </div>

                <button type="button" id="store" onclick="add_item_to_carts()" class="btn btn-block btn-dark">
                      <i class="fa fa-plus"> Add </i>
                      </button>
                <button type="button" id="Update" onclick="Updatecart()" class="btn btn-block btn-dark">
                      <i class="fa fa-plus"> Update </i>
                      </button>
                      <br>
                      <br>

           </div><!-- end row -->
           <br>

        </div>

                <style type="text/css">


                  .table-responsive {
                      white-space: normal;
                  }
                  .dataTables_length{
                      display: none;
                  }
 

                .scrollContent {
                  display: block;
                  height: 350px;
                  overflow: auto;
                  width: 100%;
                }

                </style>


            <div id="show_add_to_cart_item">
              <table width="1000" class="table table-bordered scrollContent">
                      <thead>
                        <tr>
                         
                          <th style="width: 2px">id </th>
                          <th style="width: 3px"> Type</th>
                          <th style="width: 10%">Code</th>
                          <th style="width: 5%"> Grade</th>
                          <th style="width: 10%">Specification</th>
                          <th style="width: 5%">Ctn./Pcs. </th>
                          
                          <th style="width: 15%">U.Price </th>
                          <th style="width: 15%">Subtotal Price </th>
                         
                          
                          <th style="width: 10%"> T.Comm. </th>

                          <th style="width: 15%"> Total Price </th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php  $i=1;  @endphp
                        @foreach($salesItem as $row => $data)
                          <tr>
                            <td>{{$data->id}}</td>
                           
                           <td>{{$data->product_type}}</td>
                           <td>{{$data->product_code}}</td>
                           <td>{{$data->grade}}</td>
                           <td>{{$data->product_specification}}</td>
                           <td>{{$data->ctn_pcs}}</td>
                           
                          
                          
                           <td>{{$data->amount}}</td>
                           <td>{{$data->t_amount}} </td>
                           <td>{{$data->comission}}&nbsp;&nbsp;&nbsp;&nbsp; </td>
                           <td>{{$data->total_price}}</td>
                          

                              <td>
                                <button type="button" onclick="editcart(this)" class="btn btn-sm btn-info" id="edit" data-id="{{ $data->id }}"><i class="fa fa-edit"></i></button>

                               <!--  <button type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="deletefn(this)" data-id="{{ $data->id }}"><i class="fa fa-times"></i>
                             </button> -->
                             <button type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="deletefn(this)" data-id="{{ $data->id }}"><i class="fa fa-times"></i>
                               
                               <!-- <a class="btn btn-sm btn-info" href="#" id="edit">Edit</a> -->
                               
                           </td>
                           </tr>

                       @endforeach

                      
                      </tbody>
                </table>
              </div>

       


<br><br>
        <div class="calculat">

          <div class="row">

             <div class="col-md-6">
               <div class="row">
                  <div class="col-md-6">

                   <div class="form-group">
                     <label for="brand">Prev. Due/Advance</label>
                     <input class="form-control" value="{{$bill_edit->Prev_due}}" readonly=""  type="text" id="openig_due" name="openig_due" placeholder="due">

                      <input type="hidden" readonly="" value="{{$bill_edit->f_prev_due}}" name="f_prev_due" class="form-control" id="f_prev_due">
                      <input type="hidden" name="f_prev_due_edit" value="{{$customer->f_openig_due}}" class="form-control" >
                   </div>

                 </div>
                 <div class="col-md-4">
                   
                   
                 </div>
                 

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="brand">Cash Info</label>
                      <input type="text" name="cash_info" value="{{$bill_edit->cash_info}}" id="cash_info" class="form-control" placeholder="Entr cash Info">
                      
                   </div>
                   
                 </div>

                 <div class="col-md-4">
                    <div class="form-group">
                      <label for="brand">Cash Balance</label>
                      <input type="text" name="cash" value="{{$bill_edit->cash}}" id="cash" class="form-control" placeholder="Entr cash balance">
                      
                   </div>
                   
                 </div>
                 <div class="col-md-2"></div>


                  <div class="col-md-6">

                     <div class="form-group">
                      <label for="brand">Carriage info</label>
                      <input class="form-control" value="{{$bill_edit->carriage_info}}"  type="text" id="carriage_info" name="carriage_info" placeholder="Entr carriage info">
                    </div>
                    
                  </div>

                 <div class="col-md-4">

                    <div class="form-group">
                      <label for="brand">Carriage Balance</label>
                      <input class="form-control" value="{{$bill_edit->carriage}}"  type="text" id="carriage" name="carriage" placeholder="Entr carriage">
                    </div>

                </div>
                <div class="col-md-2"></div>


                <div class="col-md-6">

                     <div class="form-group">
                      <label for="brand">Breakage info</label>
                      <input class="form-control" value="{{$bill_edit->breakage_info}}"  type="text" id="breakage_info" name="breakage_info" placeholder="Entr breakage info">
                    </div>
                    
                  </div>

                 <div class="col-md-4">

                    <div class="form-group">
                      <label for="brand">Breakage Balance</label>
                      <input class="form-control" value="{{$bill_edit->breakage}}"  type="text" id="breakage" name="breakage" placeholder="Entr breakage">
                    </div>

                </div>
                <div class="col-md-2"></div>

                <div class="col-md-6">
                     <div class="form-group">
                      <label for="brand">Incentives Info</label>
                      <input class="form-control" value="{{$bill_edit->incentives_info}}" type="text" id="incentives_info" name="incentives_info" placeholder="incentives Info">
                    </div>
                   
                 </div>

                 <div class="col-md-4">
                     <div class="form-group">
                      <label for="brand">Incentives Balance</label>
                      <input class="form-control" value="{{$bill_edit->incentives}}" type="text" id="incentives" name="incentives" placeholder="incentives">
                    </div>
                   
                 </div>
                 <div class="col-md-2"></div>

                <div class="col-md-6">

                     <div class="form-group">
                      <label for="brand">Comission info</label>
                      <input class="form-control" value="{{$bill_edit->comission_info}}"  type="text" id="comission_info" name="comission_info" placeholder="Entr comission info">
                    </div>
                    
                  </div>

                 <div class="col-md-4">

                    <div class="form-group">
                      <label for="brand">Comission Balance</label>
                      <input class="form-control" value="{{$bill_edit->comission_balance}}" type="text" id="comission_balance" name="comission_balance" placeholder="Entr comission balance">
                    </div>

                </div>
                <div class="col-md-2"></div>


                 





               </div>
             </div>
             <div class="col-md-6">
               <div  class="row">
                
                  
                    
                   
                    {{-- <div class="col-md-3">
                           <div class="form-group">
                          <label for="total Price">Total Price </label>
                          <input class="form-control" value="{{$total_price}}"  readonly="" type="number" id="total_taka" name="total_taka" placeholder="total taka">
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                           <div class="form-group">
                          <label for="total Price">Total Ctn. </label>
                          <input class="form-control" value="{{$total_quantity}}"  readonly="" type="number" id="total_taka" name="total_taka" placeholder="total taka">
                        </div>
                    </div> --}}

                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="brand">To.with.Comm</label>
                        <input class="form-control"  value="{{$t_amount}}" readonly=""  type="text" id="t_w_comm" name="t_w_comm" placeholder="" >
                      </div>
                      
                    </div>

                    
                    <div class="col-md-3">

                       <div class="form-group">
                        <label for="brand">Tot. Comission</label>
                        <input class="form-control" readonly="" value="{{$comission}}"  type="text" id="tot_comission" name="tot_comission" placeholder="" >
                      </div>
                      
                    </div>
                   <!--  <div class="col-md-3">
                       <div class="form-group">
                        <label for="brand">Tot. Quantity</label>
                         <input class="form-control" readonly="" value="{{$total_quantity}}"  type="text" id="tot_quantity" name="tot_quantity" placeholder="" > 
                      </div>
                      
                    </div> -->
                    <div class="col-md-3">
                           <div class="form-group">
                          <label for="total Price">Total Price </label>
                          <input class="form-control" value="{{$total_taka}}"  readonly="" type="number" id="total_taka" name="total_taka" placeholder="total taka">
                        </div>
                    </div>


                   {{--  <div class="col-md-6"></div> --}}

                  
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="brand">Special Discount Info</label>
                        <input class="form-control" value="{{$bill_edit->special_discount_info}}"  type="text" id="special_discount_info" name="special_discount_info" placeholder="Entr special discount Info" >
                      </div>
                   
                   </div>

                 <div class="col-md-4">
                      <div class="form-group">
                        <label for="brand">Special Discount </label>
                        <input class="form-control" value="{{$bill_edit->discount}}"  type="text" id="special_discount" name="special_discount" placeholder="Entr special discount" >
                      </div>
                 </div>
                 <div class="col-md-2"></div>

                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="brand">TT/Deposit  Info</label>
                        <input class="form-control" value="{{$bill_edit->tt_deposit_info}}"  type="text" id="tt_deposit_info" name="tt_deposit_info" placeholder="Entr TT/Deposit info" >
                      </div>
                   
                   </div>

                 <div class="col-md-4">
                      <div class="form-group">
                        <label for="brand">TT/Deposit  Balance</label>
                        <input class="form-control" value="{{$bill_edit->tt_deposit_balance}}"  type="text" id="tt_deposit_balance" name="tt_deposit_balance" placeholder="TT/Deposit balance" >
                      </div>
                 </div>
                 <div class="col-md-2"></div>


                 <div class="col-md-6">
                      <div class="form-group">
                        <label for="brand">Missing Deposit  Info</label>
                        <input class="form-control" value="{{$bill_edit->missig_deposit_info}}"  type="text" id="missig_deposit_info" name="missig_deposit_info" placeholder="Entr TT/Deposit info" >
                      </div>
                   
                   </div>

                 <div class="col-md-4">
                      <div class="form-group">
                        <label for="brand">Missing Deposit  Balance</label>
                        <input class="form-control" value="{{$bill_edit->missig_deposit_balance}}"  type="text" id="missig_deposit_balance" name="missig_deposit_balance" placeholder="Missing Deposit  Balance" >
                      </div>
                 </div>
                 <div class="col-md-2"></div>

                 <div class="col-md-6">
                      <div class="form-group">
                        <label for="brand">Other Info </label>
                        <input type="text" name="other_info" value="{{$bill_edit->other_info}}" class="form-control" id="other_info" placeholder="Entr Other Info">
                      
                      </div>
                   
                   </div>

                 <div class="col-md-4">
                     <div class="form-group">
                      <label for="brand">Other  </label>
                      <input type="text" name="other" value="{{$bill_edit->other}}" class="form-control" id="other" placeholder="Entr Other">
                      
                    </div>
                 </div>
                 <div class="col-md-2"></div>


                 <div class="col-md-6">
                       <br>
                  <!--   <p class="text-center"><b> Balance </b> </p> -->
                    
                  </div>

                 <div class="col-md-4">

                     <div class="form-group">
                        <label for="brand">Due/Balance  </label>
                        <input type="text" name="due_bal" class="form-control" id="due_bal" placeholder="Entr Other">


                            
                     </div>

                </div>
                <div class="col-md-2">
                   
                </div>

               </div>
             </div>
            
          </div>


     
        </div>
    <div class="row" style="margin-top: 15px;">

        


     </div>  <!-- end row -->


      <div class="row" style="margin-top: 15px;">

        <div class="col-md-6">

           <div class="form-group">


               @if($bill_edit->condition !=NULL)
              <input type="checkbox" id="condition" name="condition" value="yes" checked="">
              @else
              <input type="checkbox" id="condition" name="condition" value="yes" >
              @endif
               <label for="condition">Terms and Conditions</label><br>
                  
    
           </div>
          
        </div>

         <div class="col-md-6">

          
        </div>
      </div>


              <div class="col-md-12">
                  <div class="form-group">
                      <button type="submit" class="btn btn-block btn-dark">
                      <i class="fa fa-plus"> Update  </i>
                      </button>
                  </div>
              </div>


            </div>
          </div>
               
          </div>
        </div>




      </div><!--End Row-->
    </form>
       <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->




@include('expert.copyright')

  @endsection

  @section('js')

<script type="text/javascript">

/*$("#show_medicine_select").hide();*/

 function check_cus(){

var customer_code= $("#customer_code").val();
var date = $("#date").val();
console.log(date);
$.ajax({
        url: "{{url('admin/checkcustomer')}}",
        data: {
          customer_code:customer_code,
          date : date

        },
        success: function(data){
        $("#warning").html(data);
        
      
        }
      });

}






   var store=$('#store');
   var update=$('#Update');
   update.hide();

  $("#serial_number").focus();

  $(document).ready(function() {
      $("#customer_code").select2();
      $("#product_code").select2();
    /*  $("#status").select2();
      $("#pat_id").select2();*/
      
  });


   $(document).ready(function() {
         $('select[name="product_code"]').on('change', function(){
             var product_code = $(this).val();
            console.log(product_code);

             
             if(product_code) {
                 $.ajax({
                     url: "{{  url('admin/product_code/') }}/"+product_code,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                     // var d =$('select[name="grade"]').empty();

                           $('#product_name').val(data.product_name);
                           $('#product_type').val(data.product_type);
                           $('#grade').val(data.grade);
                           $('#product_specification').val(data.product_specification);
                           $('#unit_price').val(data.unit_price);
                           $('#comission').val(data.total_comission);
                           $('#product_codes').val(data.product_code);
                          


                           
                       
  
                     },
                    
                 });
             } else {
                 alert('danger');
             }

         });
     });




function  calculat(){
  var cashmemoid = document.getElementById("cashmemo").value;
  
/*alert(cashmemoid);*/
   $.ajax({
        url: "{{url('admin/calculate_total')}}",
        data: {cashmemoid:cashmemoid},
        success: function(data){
        $("#total_taka").html(data);
        $("#total_taka").val(data);

       /* document.getElementById("inDiscount").value="";
        document.getElementById("inPayment").value="";*/

        }
      });
}

function  calculatcartoon(){
  var cashmemoid = document.getElementById("cashmemo").value;
  
/*alert(cashmemoid);*/
   $.ajax({
        url: "{{url('admin/calculate_total_cartoon')}}",
        data: {cashmemoid:cashmemoid},
        success: function(data){
        $("#tot_cartoon").html(data);
        $("#tot_cartoon").val(data);

       /* document.getElementById("inDiscount").value="";
        document.getElementById("inPayment").value="";*/

        }
      });
}

function  calculatcomission(){
  var cashmemoid = document.getElementById("cashmemo").value;
  
/*alert(cashmemoid);*/
   $.ajax({
        url: "{{url('admin/calculate_total_comission')}}",
        data: {cashmemoid:cashmemoid},
        success: function(data){
        $("#tot_comission").html(data);
        $("#tot_comission").val(data);

       /* document.getElementById("inDiscount").value="";
        document.getElementById("inPayment").value="";*/

        }
      });
}


function  calculatquantity(){
  var cashmemoid = document.getElementById("cashmemo").value;
  
/*alert(cashmemoid);*/
   $.ajax({
        url: "{{url('admin/calculate_total_quantity')}}",
        data: {cashmemoid:cashmemoid},
        success: function(data){
        $("#tot_quantity").html(data);
        $("#tot_quantity").val(data);

      

        }
      });
}
 
 function  calculatectnpcs(){
  var cashmemoid = document.getElementById("cashmemo").value;
  
/*alert(cashmemoid);*/
   $.ajax({
        url: "{{url('admin/calculate_total_ctn_pcs')}}",
        data: {cashmemoid:cashmemoid},
        success: function(data){
        $("#ctn_pcs_t").html(data);
        $("#ctn_pcs_t").val(data);

      

        }
      });
}




$("#cash").on('input',function(){


var prevDue= $("#openig_due").val();
var total_taka = $("#total_taka").val();
var totalval = +prevDue + +total_taka;


var cash = $("#cash").val();

var totalc = (+totalval - +cash);
//var duetotal = totalc - inPayment;
  $('#due_bal').html(totalc);
  $('#due_bal').val(totalc);
 // $('#Duehtml').html(duetotal);

});

$("#carriage").on('input', function(){
 
   var prevDue= $("#openig_due").val();
   var total_taka = $("#total_taka").val();
   var cash = $("#cash").val();
   var carriage = $("#carriage").val();
   
   var to_sub = +cash + +carriage;
   var totalval = +prevDue + +total_taka;

   var totalc = (+totalval - +to_sub);

   $('#due_bal').html(totalc); 
   $('#due_bal').val(totalc);

})
$("#breakage").on('input', function(){
 
   var prevDue= $("#openig_due").val();
   var total_taka = $("#total_taka").val();
   var cash = $("#cash").val();
   var carriage = $("#carriage").val();
   var breakage = $('#breakage').val();
   
   var to_sub = +cash + +carriage + +breakage;
   var totalval = +prevDue + +total_taka;

   var totalc = (+totalval - +to_sub);

   $('#due_bal').html(totalc); 
   $('#due_bal').val(totalc);

})

$("#incentives").on('input', function(){
 
   var prevDue= $("#openig_due").val();
   var total_taka = $("#total_taka").val();
   var cash = $("#cash").val();
   var carriage = $("#carriage").val();
   var breakage = $('#breakage').val();
   var incentives = $('#incentives').val();
   
   var to_sub = +cash + +carriage + +breakage + +incentives;
   var totalval = +prevDue + +total_taka;

   var totalc = (+totalval - +to_sub);

   $('#due_bal').html(totalc); 
   $('#due_bal').val(totalc);


})

$("#comission_balance").on('input', function(){
 
   var prevDue= $("#openig_due").val();
   var total_taka = $("#total_taka").val();
   var cash = $("#cash").val();
   var carriage = $("#carriage").val();
   var breakage = $('#breakage').val();
   var incentives = $('#incentives').val();
   var comission_balance = $("#comission_balance").val();
   
   var to_sub = +cash + +carriage + +breakage + +incentives + +comission_balance;
   var totalval = +prevDue + +total_taka;

   var totalc = (+totalval - +to_sub);

   $('#due_bal').html(totalc); 
   $('#due_bal').val(totalc);


})




$("#special_discount").on('input', function(){
 
   var prevDue= $("#openig_due").val();
   var total_taka = $("#total_taka").val();
   var cash = $("#cash").val();
   var carriage = $("#carriage").val();
   var breakage = $('#breakage').val();
   var incentives = $('#incentives').val();
   var special_discount = $('#special_discount').val();
   var comission_balance = $("#comission_balance").val();
   
   var to_sub = +cash + +carriage + +breakage + +incentives + +comission_balance + +special_discount;
   var totalval = +prevDue + +total_taka;

   var totalc = (+totalval - +to_sub);

   $('#due_bal').html(totalc); 
   $('#due_bal').val(totalc);


})

$("#tt_deposit_balance").on('input', function(){
 
   var prevDue= $("#openig_due").val();
   var total_taka = $("#total_taka").val();
   var cash = $("#cash").val();
   var carriage = $("#carriage").val();
   var breakage = $('#breakage').val();
   var incentives = $('#incentives').val();
   var special_discount = $('#special_discount').val();
  var comission_balance = $("#comission_balance").val();
   var tt_deposit_balance = $("#tt_deposit_balance").val();

   
   var to_sub = +cash + +carriage + +breakage + +incentives + +special_discount +  +tt_deposit_balance + +comission_balance;
   var totalval = +prevDue + +total_taka;

   var totalc = (+totalval - +to_sub);

   $('#due_bal').html(totalc); 
   $('#due_bal').val(totalc);


})


$("#missig_deposit_balance").on('input', function(){
 
   var prevDue= $("#openig_due").val();
   var total_taka = $("#total_taka").val();
   var cash = $("#cash").val();
   var carriage = $("#carriage").val();
   var breakage = $('#breakage').val();
   var incentives = $('#incentives').val();
   var special_discount = $('#special_discount').val();
  var comission_balance = $("#comission_balance").val();
   var tt_deposit_balance = $("#tt_deposit_balance").val();
   var missig_deposit_balance = $("#missig_deposit_balance").val();

   
   var to_sub = +cash + +carriage + +breakage + +incentives + +special_discount +  +tt_deposit_balance + +comission_balance + +missig_deposit_balance;
   var totalval = +prevDue + +total_taka;

   var totalc = (+totalval - +to_sub);

   $('#due_bal').html(totalc); 
   $('#due_bal').val(totalc);


})


$("#other").on('input', function(){
 
   var prevDue= $("#openig_due").val();
   var total_taka = $("#total_taka").val();
   var cash = $("#cash").val();
   var carriage = $("#carriage").val();
   var breakage = $('#breakage').val();
   var incentives = $('#incentives').val();
   var special_discount = $('#special_discount').val();
  var comission_balance = $("#comission_balance").val();
   var tt_deposit_balance = $("#tt_deposit_balance").val();
   var missig_deposit_balance = $("#missig_deposit_balance").val();
   var other = $("#other").val();

   
   var to_sub = +cash + +carriage + +breakage + +incentives + +special_discount +  +tt_deposit_balance + +comission_balance + +missig_deposit_balance + +other;
   var totalval = +prevDue + +total_taka;

   var totalc = (+totalval - +to_sub);

   $('#due_bal').html(totalc); 
   $('#due_bal').val(totalc);


})



$("#custome").on('input',function(){
  var  customer_address  = $("#customer_address").val();
  alert("jkhgjgj");
  console.log("jhkjhk");

})





  $(document).ready(function() {
         $('select[name="customer_code"]').on('change', function(){
             var customer_code = $(this).val();
            console.log(customer_code);
             
             if(customer_code) {
                 $.ajax({
                     url: "{{  url('admin/customercode/') }}/"+customer_code,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        //var d =$('input[name="product_name"]').empty();
                            
                           $('#customer_name').val(data.customer_name);
                           $('#customer_address').val(data.customer_address);
                           $('#openig_due').val(data.openig_due);
                           $('#ship_to').val(data.customer_name);
                           $('#customer_phone').val(data.customer_phone);
                         
                           check_cus();
                          // console.log(data.product_name);
  
                     },
                    
                 });
             } else {
                 alert('danger');
             }

         });
     });

function Updatecart(){
          
        var id = document.getElementById("id").value;
        var product_code = document.getElementById("product_codes").value;
        var qty = document.getElementById("qty").value;
        var amount = document.getElementById("unit_price").value;
        var cashmemo=document.getElementById("cashmemo").value;
        var grade=document.getElementById("grade").value;
        var comission=document.getElementById("comission").value;
        var product_type=document.getElementById("product_type").value;
       var product_name = document.getElementById("product_name").value;
        var product_specification=document.getElementById("product_specification").value;
        var quantity_per_sqf=document.getElementById("quantity_per_sqf").value;

         $.ajax({
            url: "{{url('admin/update')}}",
            data:{
                  id:id,
                  product_code: product_code,
                  qty: qty,
                  amount: amount,
                  cashmemo: cashmemo,
                  grade:grade,
                  comission:comission,
                  product_type:product_type,
                 product_name:product_name,
                  product_specification:product_specification,
                  quantity_per_sqf:quantity_per_sqf

            },
            success: function(data){
              $("#purchase").find("#show_add_to_cart_item").html(data);
              location.reload();
               update.hide();
              store.show(); 
              clearfiled();
              calculat();
              calculatcartoon();
              calculatcomission();
              calculatquantity();
              calculatectnpcs();
            }
    });

}



function add_item_to_carts(){
    var product_code = document.getElementById("product_codes").value;
    var product_name = document.getElementById("product_name").value;
    var qty = document.getElementById("qty").value;
    var amount = document.getElementById("unit_price").value;
    var cashmemo=document.getElementById("cashmemo").value;
    var grade=document.getElementById("grade").value;
    var comission=document.getElementById("comission").value;
    var product_type=document.getElementById("product_type").value;
   
    var product_specification=document.getElementById("product_specification").value;
    var quantity_per_sqf=document.getElementById("quantity_per_sqf").value;
    //alert(amount);
    //console.log(cashmemo);

    $.ajax({
            url: "{{url('admin/add_item_to_carts')}}",
            data:{
                  product_code: product_code,
                  product_name:product_name,
                  qty: qty,
                  amount: amount,
                  cashmemo: cashmemo,
                  grade:grade,
                  comission:comission,
                  product_type:product_type,
                 
                  product_specification:product_specification,
                  quantity_per_sqf:quantity_per_sqf

            },
            success: function(data){
              $("#purchase").find("#show_add_to_cart_item").html(data);
              calculat();
              calculatcartoon();
              calculatcomission();
              calculatquantity();
              clearfiled();
              calculatectnpcs();
            }
    });
};

function clearfiled(){
    var product_name = document.getElementById("product_name").value='';
    var product_code = document.getElementById("product_code").value = '';
    var qty = document.getElementById("qty").value = '';
    var amount = document.getElementById("unit_price").value = '';
    var grade = document.getElementById("grade").value = '';
    var product_codes = document.getElementById("product_codes").value='';
    var product_specification = document.getElementById("product_specification").value="";
    var comission = document.getElementById("comission").value = '';
    var product_type = document.getElementById("product_type").value = '';
   
    var quantity_per_sqf = document.getElementById("quantity_per_sqf").value = '';

}


function editcart(ele){
  var data = $(ele).data("id");

   $.ajax({
              url: "{{url('admin/editcartwith')}}",
             data: {data},
            success: function(data){
            $("#purchase").find("#show_medicine_select").html(data);

                    calculat();
                    calculatcartoon();
                    calculatcomission();
                    calculatquantity();
                    calculatectnpcs();
                  }
              });


}

function deletefn(ele) {
var cashmemo=document.getElementById("cashmemo").value;
var data= $(ele).data("id");

swal({
          title: "Are you sure?",
          text: "Once deleted",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: "{{url('admin/med_sales_delete_from_cart')}}",
                  data: {data:data , cashmemo:cashmemo},
                  success: function(data){
                    $("#purchase").find("#show_add_to_cart_item").html(data);

                    calculat();
                    calculatcartoon();
                    calculatcomission();
                    calculatquantity();
                    calculatectnpcs();
                  }
              });
          }
      });
  }



</script>

@endsection





