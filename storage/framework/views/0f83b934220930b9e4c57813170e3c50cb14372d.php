<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<style type="text/css">
    @media  print {
.noprint{
  display: none;
}
}
td{
  font-size: 15px;
}
hr{

}
  </style>

  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="900" height="100" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="336" align="right" valign="middle"><span style="padding-top:40px;"><!-- <img src="<?php echo e(asset('/logo/'.$settingsinfo->logo)); ?>" width="100" height="70" align="texttop" /> --></span></td>
            <td width="15" align="left" valign="middle">&nbsp;</td>
            <td width="639" align="left" valign="middle">
        
             
              <p style="margin-top: 30px;"><strong style="font-size: 35px;" > <?php echo e($settingsinfo->company_name); ?></strong> <br>
                <!--<strong><?php echo e($settingsinfo->address); ?></strong><br><br>-->
                <strong style="padding-left: 50px;text-align: center;">Telephone:<?php echo e($settingsinfo->phone); ?></strong>
                <br>
              </p>
              
            </td>
          </tr>

          

        </table></td>
      </tr>
      <tr>
        <td><div align="center"><strong style="padding-left: 15px;font-size: 20px;">Monthly Sales Statement</strong></div></td>
      </tr>
      <tr>
        <td>
      </tr>
    </table>

  


  <hr style="height: 2px;
  background-color: black;">
  <br>
 <table width="1100"  align="center">
  <tr>
    <td style=""> 
      From Date: <?php echo e($from_date_new); ?>

    </td>

    <td style="text-align: right;">

      To Date : <?php echo e($to_date_new); ?>

    </td>
    
  </tr>
</table>
<div style="min-height: 500px">
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

               <!--  <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">M.Comm.</th>
                
                 <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Incentives</th> -->

                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Spc.Dis.</th>
               <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Carriage</th>
               
               
                
              <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Other</th>

              
              
              <th width="60" style="border-bottom: 1px solid rgb(0,0,0) ">Bal/Due</th>
  </tr>
  <?php $i=1;  ?>

 <?php 

  $i=1; $to_a_q=0; $to_b_q=0;$ab_q=0;$ab=0;$pre_d=0;$bal=0; $bal_f=0;

        $tt = 0 ; $missig=0 ; $comission=0; $t_comm=0;
      
       $incen = 0;$dis=0;$carr=0;$ot=0; 
       $w_co_to=0;

       $setting = DB::table('settings')
        ->first();

 ?>
       <?php $__currentLoopData = $cart_manage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


        <?php

        if($setting->cndition==0){
        $public = DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->get();
      }else{

      $public = DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->get();

    }
        ?>
       <?php if(count($public)!=0): ?>

       <tr style="text-align: center;">

        <?php 
        
        
        
        if($setting->cndition==0){

        $key_bal =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        
        ->orderBy('id','DESC')
        ->first();


        $key =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('grade_a');

        $key_b =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('grade_b');

        $total =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('total');

        $tt_deposit_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('tt_deposit_balance');

        $missig_deposit_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('missig_deposit_balance');

        $comission_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('comission_balance');


        $total_comission =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
     
        ->sum('total_comission');

        $incentives =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('incentives');

         $discount =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('discount');

         $carriage =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('carriage');

         $other =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('other');

         $Prev_due =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('Prev_due');

         $total_with_comm =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('total_with_comm');

         $balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->sum('balance');
        
        }
        else{

        $key_bal =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->orderBy('id','DESC')
        ->first();
        
        $key =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('grade_a');

        $key_b =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('grade_b');

        $total =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('total');

        $tt_deposit_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('tt_deposit_balance');

        $missig_deposit_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('missig_deposit_balance');

        $comission_balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('comission_balance');

         $total_comission =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('total_comission');

        $incentives =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('incentives');

         $discount =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('discount');

         $carriage =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('carriage');

         $other =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('other');

         $Prev_due =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('Prev_due');

        $total_with_comm =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('total_with_comm');

         $balance =  DB::table('cart_manage')
        ->whereBetween('date', [$from_date, $to_date])
        ->where('customer_name', $row->customer_name)
        ->where('condition','yes')
        ->sum('balance');
        
        
        
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
        $bal_f += $row->f_openig_due;
        ?>


            <td style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($i++); ?>

            </td>
        
            
            <td style="text-align: left;border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">
             <?php echo e($row->customer_name); ?>

            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
               <?php echo e($key); ?>

            </td>

            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
               <?php echo e($key_b); ?>

            </td>

            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
               <?php echo e($total_with_comm); ?>

            </td>

            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($total_comission); ?>

            </td>
            
            
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
            <?php echo e($total); ?>

            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             <?php echo e($tt_deposit_balance); ?>

            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             <?php echo e($missig_deposit_balance); ?>

            </td>
            
           <!--  <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($comission_balance); ?>

            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             <?php echo e($incentives); ?>

            </td> -->
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             <?php echo e($discount); ?>

            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($carriage); ?>

            </td>
            
           
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
             <?php echo e($other); ?>

            </td>
            
           <!--  <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              
            </td> -->

   <!--  -->


    <td style="border-bottom: 1px solid rgb(0,0,0) ">
    <?php if($setting->cndition==0): ?>
     <?php echo e(isset($key_bal->balance) ? $key_bal->balance : 0); ?>

     <?php else: ?>
     <?php echo e(isset($key_bal->f_balance) ? $key_bal->f_balance : 0); ?>

     <?php endif; ?>
      
    </td>
      
  </tr>

  <?php endif; ?>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
              <?php echo e($w_co_to); ?>.00
            </th>

            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($t_comm); ?>.00
            </th>
           
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($ab); ?>.00
            </th>
            <th
             style="border-right: 1px solid rgb(0,0,0); ">
               <?php echo e($tt); ?>.00
            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($missig); ?>.00
            </th>
            
           <!--  <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($comission); ?>.00
            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($incen); ?>.00
            </th> -->
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($dis); ?>.00
            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($carr); ?>.00
            </th>
           

           


            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($ot); ?>.00
            </th>
            
            
           <!--  <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              
            </td> -->

   <!--  -->


    <th style="">
      <?php if($setting->cndition==0): ?>
     <?php echo e($bal); ?>

     <?php else: ?>
     <?php echo e($bal_f); ?>

     <?php endif; ?>
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
  <tr class="noprint">
    <td style="text-align: center;"> <a href="<?php echo e(URL::to('admin/monthlysalestatementdateselect')); ?>" style="background: #db5246; border: 1px solid #db5246; padding:20px; color: #ffffff; text-decoration: none; ">back</a></td>

    <td>

      <button onclick="window.print()"  style="background: green; border: 1px solid #db5246; padding:20px; color: #ffffff; text-decoration: none; ">Print</button>
    </td>
    
  </tr>
</table>
</body>
</html><?php /**PATH /home/nsbusine/public_html/Cosmo_luxary_sanitary_ware/resources/views/admin/report/monthlysalestatement.blade.php ENDPATH**/ ?>