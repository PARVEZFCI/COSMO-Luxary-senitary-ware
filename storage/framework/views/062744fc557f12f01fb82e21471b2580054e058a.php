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
        <td><div align="center"><strong style="padding-left: 15px;font-size: 20px;">Single  Dealer  Sales Statement in Data Range</strong></div></td>
      </tr>
      <tr>
        <td>
      </tr>
    </table>
  

 
  <hr style="height: 2px;
  background-color: black;">
  <br>
  <div style="min-height: 600px">
 <table width="1100"  align="center">
  <tr>
    <td style=""> 
      From Date: <?php echo e($from_date_new); ?>

    </td>

    <td style="text-align: center;"> <strong style="font-size:27px;"><?php echo e($customer_name); ?></strong> </td>

    <td style="text-align: right;">

      To Date : <?php echo e($to_date_new); ?>

    </td>
    
  </tr>
</table>
<table width="1100" style="border: 1px solid black" align="center">
   <tr>
    <th width="30" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">SL</th>

               
              <th width="120" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Date</th>
              <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); "> Pre.Due</th>
               <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); "> A </th>
                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); "> B</th>

               <!--  <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">A & B</th> -->

               <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); "> Price </th>
                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Commission</th>
                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Net.Price</th>

                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">TT/Deposit</th>
               <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Miss.Diposit</th>

                <!-- <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">M.Comm.</th>
                
                 <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Incentives</th> -->

                <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Spc.Dis.</th>
               <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Carriage</th>
               
               
              <th width="50" style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">Other</th>

            
              
              <th width="60" style="border-bottom: 1px solid rgb(0,0,0) ">Bal/Due</th>
  </tr>
  <?php $i=1;  ?>

 <?php

  $i=1; $to_a_q=0; $to_b_q=0;$ab_q=0;$ab=0;$pre_d=0;$balance=0; 
        $tt = 0 ; $missig=0 ; $comission=0;
      
       $incen = 0;$dis=0;$carr=0;$ot=0;$t_com=0;
       $w_c_t = 0;


       $setting = DB::table('settings')
        ->first();



  ?>
       <?php $__currentLoopData = $cart_manage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr style="text-align: center;">

        <?php 

        $to_a_q +=$row->grade_a;
        $to_b_q  += $row->grade_b;
        $ab_q += $row->grade_a + $row->grade_b;
        $ab  += $row->total;
        $pre_d += $row->Prev_due;
        $balance += $row->balance;
        $tt += $row->tt_deposit_balance;
        $missig += $row->missig_deposit_balance;
        $comission += $row->comission_balance;
        $incen += $row->incentives;
        $dis += $row->discount;
        $carr += $row->carriage;
        $ot += $row->other;
        $t_com += $row->total_comission;
        $w_c_t += $row->total_with_comm;



        ?>
            <td style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($i++); ?>

            </td>

            
            <td style="border-bottom: 1px solid rgb(0,0,0);border-right: 1px solid rgb(0,0,0); ">
                <?php echo e(date("d-m-Y", strtotime($row->date))); ?>

            
            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">

               <?php if($setting->cndition==0): ?>

                       <?php echo e($row->Prev_due); ?>


                       <?php else: ?>
                       <?php echo e($row->f_prev_due); ?>

                       <?php endif; ?>
              
            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->grade_a); ?>

            </td>

            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->grade_b); ?>

            </td>

            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->total_with_comm); ?>

            </td>

            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->total_comission); ?>

            </td>
           
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->total); ?>

            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->tt_deposit_balance); ?>

            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->missig_deposit_balance); ?>

            </td>
            <!-- 
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->comission_balance); ?>

            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->incentives); ?>

            </td> -->
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->discount); ?>

            </td>
            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->carriage); ?>

            </td>
            

            <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              <?php echo e($row->other); ?>

            </td>
            
           <!--  <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              
            </td> -->

   <!--  -->


    <td style="border-bottom: 1px solid rgb(0,0,0) ">
       <?php if($setting->cndition==0): ?>

                       <?php echo e($row->balance); ?>


                       <?php else: ?>
                       <?php echo e($row->f_balance); ?>

                       <?php endif; ?>
      
    </td>
      
  </tr>

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
              
            </th>

            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($w_c_t); ?>

              
            </th>

            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($t_com); ?>

            </th>
         
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($ab); ?>

            </th>
            <th
             style="border-right: 1px solid rgb(0,0,0); ">
               <?php echo e($tt); ?>

            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($missig); ?>

            </th>
            
            <!-- <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($comission); ?>.00
            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($incen); ?>.00
            </th> -->
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($dis); ?>

            </th>
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($carr); ?>

            </th>
            
            <th style="border-right: 1px solid rgb(0,0,0); ">
              <?php echo e($ot); ?>

            </th>
           
           <!--  <td style="border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0);">
              
            </td> -->

   <!--  -->


    <th style="">
   
    </th>
  </tr>
</table>

<br><br><br>
</div>

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
    <td style="text-align: center;"> <a href="<?php echo e(URL::to('admin/dealerwisesalestatmentdateselect')); ?>" style="background: #db5246; border: 1px solid #db5246; padding:20px; color: #ffffff; text-decoration: none; ">back</a></td>

    <td>

      <button onclick="window.print()"  style="background: green; border: 1px solid #db5246; padding:20px; color: #ffffff; text-decoration: none; ">Print</button>
    </td>
    
  </tr>
</table>
</body>
</html><?php /**PATH D:\Xampp\htdocs\Cosmo_luxary_sanitary_ware\resources\views/admin/report/dealerwisesalestatment.blade.php ENDPATH**/ ?>