<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

  <style type="text/css">
    td{
      font-size: 15px;
    }
  </style>

  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="900" height="100" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="336" align="right" valign="middle"><span style="padding-top:40px;"><!-- <img src="{{ asset('/logo/'.$settingsinfo->logo)}}" width="100" height="70" align="texttop" /> --></span></td>
            <td width="15" align="left" valign="middle">&nbsp;</td>
            <td width="639" align="left" valign="middle">
        
              
              <p style="margin-top: 30px;"><strong style="font-size: 35px;" > {{$settingsinfo->company_name}}</strong> <br>
                <!--<strong>{{$settingsinfo->address}}</strong><br><br>-->
                <strong style="padding-left: 50px;text-align: center;">Telephone:{{$settingsinfo->phone}}</strong>
                <br>
              </p>
              
            </td>
          </tr>

          

        </table></td>
      </tr>
      <tr>
        <td><div align="center"><strong style="padding-left: 15px;font-size: 20px;">Dealer Wise  Statment</strong></div></td>
      </tr>
      <tr>
        <td>
      </tr>
    </table>

   <hr style="height: 2px;
  background-color: black;">

 
 <table width="1100"  align="center">
  <tr>
    <td style=""> 
      From Date: {{$from_date_new}}
    </td>

    <td style="text-align: right;">

      To Date : {{$to_date_new}}
    </td>
    
  </tr>
</table>
<div style="min-height: 800px">
<table width="1100" style="border: 1px solid black" align="center">
   <tr>
    <th width="30" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">SL</th>

               

               <th width="120" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Customer Name</th>
               <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); "> A </th>
                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); "> B</th>
                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Price</th>

                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Commission</th>
               
                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Net.Price</th>

                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">TT/Deposit</th>
               <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Miss.Diposit</th>

              <!--   <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">M.Comm.</th>
                
                 <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Incentives</th> -->

                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Spc.Dis.</th>
               <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Carriage</th>
               
               
                
              <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Other</th>

              
              
              <th width="60" style="border-bottom: 1px solid rgb(0,0,0) ">Bal/Due</th>
  </tr>
  @php $i=1;  @endphp

 @php 

  $i=1; $to_a_q=0; $to_b_q=0;$ab_q=0;$ab=0;$pre_d=0;$bal=0;$bal_f=0; 

        $tt = 0 ; $missig=0 ; $comission=0; $t_comm=0;
      
       $incen = 0;$dis=0;$carr=0;$ot=0; 
       $w_co_to = 0;

 @endphp
       @foreach($cart_manage as $row)
       <tr style="text-align: center;">

       
        @php 
        
        $setting = DB::table('settings')
        ->first();
        
        if($setting->cndition==0){
        

        $key_bal =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->orderBy('id','DESC')
        ->first();

        $key =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('grade_a');

        $key_b =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('grade_b');

        $total =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('total');

        $tt_deposit_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('tt_deposit_balance');

        $missig_deposit_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('missig_deposit_balance');

        $comission_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('comission_balance');

         $total_comission =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
     
        ->sum('total_comission');

        $incentives =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('incentives');

         $discount =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('discount');

         $carriage =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('carriage');

         $other =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('other');

         $Prev_due =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('Prev_due');

        $total_with_comm =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('total_with_comm');

          $breakage =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('breakage');

        $cash =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->sum('cash');


      
        
        }
        else{

        $key_bal =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->orderBy('id','DESC')
        ->first();
        

        $key =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('grade_a');

        $key_b =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('grade_b');

        $total =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('total');

        $tt_deposit_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('tt_deposit_balance');

        $missig_deposit_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('missig_deposit_balance');

        $comission_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('comission_balance');

         $total_comission =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('total_comission');

        $incentives =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('incentives');

         $discount =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('discount');

         $carriage =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('carriage');

         $other =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('other');

         $Prev_due =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('Prev_due');

        $total_with_comm =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('total_with_comm');

         $breakage =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('breakage');

        $cash =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_code', $row->customer_code)
        ->where('condition','yes')
        ->sum('cash');
        
        
        }

        

        $to_a_q +=$key;

        $to_b_q  += $key_b;
        $ab_q += $key_b + $key;
        $ab  += $total;

        $tt += $tt_deposit_balance;
        $missig += $missig_deposit_balance;
        $comission += $comission_balance;
        $incen += $incentives;
        $dis += $discount;
        $carr += $carriage;
        $ot += $other;

        $pre_d += $Prev_due;
        $bal += $row->openig_due;
        $t_comm += $total_comission;
        $w_co_to += $total_with_comm;

        $bal_f +=$row->f_openig_due;

        @endphp


            <td style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">
              {{$i++}} 
            </td>
            @php

        
        
            @endphp
            <td style="text-align: left;border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">
             {{$row->customer_name}}
            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
               {{$key}}
            </td>

            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
               {{$key_b}}
            </td>

                 
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              {{ $total_with_comm}}
            </td>

             <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              {{ $total_comission}}
            </td>
            
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
            {{$total}}
            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             {{$tt_deposit_balance}}
            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             {{$missig_deposit_balance}}
            </td>
            
            <!-- <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              {{$comission_balance}}
            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             {{$incentives}}
            </td> -->
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             {{$discount}}
            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              {{$carriage}}
            </td>
           
           
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             {{$other}}
            </td>
            
           <!--  <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              
            </td> -->

   <!--  -->


    <td style="border-bottom: 1px solid rgb(0,0,0) ">


     <br>

     @if($setting->cndition==0)
     {{ isset($key_bal->balance) ? $key_bal->balance : 0 }}
     @else
     {{ isset($key_bal->f_balance) ? $key_bal->f_balance : 0 }}
     @endif


    

   
      
    </td>
      
  </tr>

  @endforeach


  <tr>
   
             <td style="border-right: 1px solid rgb(0,0,0); ">
              
            </td>

            
            <th style="border-right: 1px solid rgb(0,0,0); ">
                Total : 
            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              
            </th>

            <th style="border-right: 1px solid rgb(0,0,0); ">
             
            </th>

            <th style="border-right: 1px solid rgb(0,0,0); ">
              {{$w_co_to}}
            </th>

            <th style="border-right: 1px solid rgb(0,0,0); ">
              {{$t_comm}}
            </th>
           
            <th style="border-right: 1px solid rgb(0,0,0); ">
              {{$ab}}
            </th>
            <th
             style="border-right: 1px solid rgb(0,0,0); ">
               {{$tt}}
            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              {{$missig}}
            </th>
            
           <!--  <th style="border-right: 1px solid rgb(0,0,0); ">
              {{$comission}}.00
            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              {{$incen}}.00
            </th> -->
            <th style="border-right: 1px solid rgb(0,0,0); ">
              {{$dis}}
            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              {{$carr}}
            </th>
           

           


            <th style="border-right: 1px solid rgb(0,0,0); ">
              {{$ot}}
            </th>
            
            
           <!--  <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              
            </td> -->

   <!--  -->


    <th style="">

      
       
    </th>
  </tr>

</table>

</div>
<br><br><br>

<table width="1200"  align="center">
  <tr>

     <td>
       <hr style="width: 200px;">
        <p style="text-align: center;"> Prepared By</p>
     </td>
    <td style="text-align: center;">

       <hr style="width: 200px;">
       <p style="text-align: center;"> Authorized Signature</p> 

    </td>

    <td>

     <hr style="width: 200px;">
     <p style="text-align: center;"> Checked By</p>

    </td>
    
  </tr>
</table>



<br><br><br><br>

<table width="1000"  align="center">
  <tr>
    <td style="text-align: center;"> <a href="{{URL::to('admin/dealerwisedateselect')}}" style="background: #db5246; border: 1px solid #db5246; padding:20px; color: #ffffff; text-decoration: none; ">back</a></td>

    <td>

      <button onclick="window.print()"  style="background: green; border: 1px solid #db5246; padding:20px; color: #ffffff; text-decoration: none; ">Print</button>
    </td>
    
  </tr>
</table>
</body>
</html>