<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<style type="text/css">
    @media print {
.noprint{
  display: none;
}
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
        <td><div align="center"><strong style="padding-left: 15px;font-size: 20px;">Monthly Comission</strong></div></td>
      </tr>
      <tr>
        <td>
      </tr>
    </table>



  


 
  <hr style="height: 2px;
  background-color: black;">

  <br>

<table width="1000"  align="center">
  <tr>
    <td style=""> 
      From Date: {{$from_date_new}}
    </td>

    <td style="text-align: right;">

      To Date : {{$to_date_new}}
    </td>
    
  </tr>
</table>
<table width="1000" style="border: 1px solid black" align="center">
  <tr>
    <th width="40" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">SL</th>
    <th width="120" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Customer Name</th>
    <th width="70" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0);text-align: center; ">Month Sale A </th>
    <th width="70" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0);text-align: center; ">Month Sale B </th>
    <th width="91" style="border-bottom: 1px solid rgb(0,0,0);text-align: center; ">Comission</th>
  </tr>
   @php $i=1;  @endphp

 @php $i=1; $to_a_q=0; $to_b_q=0;$comission=0; @endphp
       @foreach($cart_manage as $row)
       <tr style="text-align: center;">

        @php 
        
         $setting = DB::table('settings')
        ->first();
        
        if($setting->cndition==0){

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
        ->sum('comission_balance');
        
        }else{
        
          
          
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
        ->sum('comission_balance');
        
        
        
        }
        

        
        $to_a_q +=$key;
        $to_b_q += $key_b;
        $comission += $total;

        @endphp
    <td style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">
      {{$i++}}
    </td>
    <td style="text-align: left;border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">
     {{$row->customer_name}}
    </td>
    <td style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0);">
     {{$key}}
    </td>
    <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
     {{$key_b}}
    </td>
    <td style="border-bottom: 1px solid rgb(0,0,0);; ">
      {{$total}}
    </td>
  </tr>
@endforeach

<td style="border-right: 1px solid rgb(0,0,0); ">
      
    </td>
    <th style="border-right: 1px solid rgb(0,0,0); ">
     Total
    </th>
    <th style="border-right: 1px solid rgb(0,0,0); ">
     {{$to_a_q}}
    </th>
    <th style="border-right: 1px solid rgb(0,0,0);">
     {{$to_b_q}}
    </th>
    <th style=" ">
      {{$comission}}
    </th>
  </tr>
  
</table>
<br><br><br><br>

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
<br><br>

<table width="1000"  align="center">
  <tr>
    <td class="noprint" style="text-align: center;"> <a href="{{URL::to('admin/monthlycomissionselctmonth')}}" style="background: #db5246; border: 1px solid #db5246; padding:20px; color: #ffffff; text-decoration: none; ">back</a></td>

    <td class="noprint">

      <button onclick="window.print()"  style="background: green; border: 1px solid #db5246; padding:20px; color: #ffffff; text-decoration: none; ">Print</button>
    </td>
    
  </tr>
</table>
</body>
</html>