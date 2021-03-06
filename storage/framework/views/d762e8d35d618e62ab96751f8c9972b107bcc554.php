<?php $__env->startSection('title', 'customer Manage - '.$settingsinfo->company_name.' - '.$settingsinfo->soft_name.''); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('expert.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('expert.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
 <style type="text/css">

   @media  print {
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
              <div class="alert alert-<?php echo e(session('class')); ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert-icon contrast-alert"><i class="icon-close"></i></div>
                <div class="alert-message"><span><?php echo e(session('message')); ?></span></div>
              </div>
        <?php endif; ?>

          <div class="card bg-dark">
      		<div class="card-header border-0  text-white" style="background-color: #FF002A;">
                <i class="fa fa-user-circle"></i><span> Customer Manage</span>
            </div>

            <div class="card">
            <div class="card-header">

              <div style="display:inline-block; padding-top:5px;">
                <i class="fa fa-table"></i> Customer List
              </div> 

              <div style="display:inline-block;float: right; padding-top:5px;">
                <?php if($user_role_per->edit == 1): ?>
                <a href="<?php echo e(url('admin/addcustomer')); ?>" class="btn btn-dark">+add new customer</a>
                <?php endif; ?>
              </div> 

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th>Customer Code</th>
                        <th>Customer Name</th>
                         <th>customer address</th>
                          <th>customer phone</th>
                        <th>customer city</th>
                        <th>customer email</th>
                        <th>openig due</th>
                      
                        <th>customer status</th>
                        
                        <th width="8%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $i=1;
                $setting = DB::table('settings')
                          ->first();       
             ?>
               <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($row->customer_code); ?></td>
                        <td><?php echo e($row->customer_name); ?></td> 
                        <td><?php echo e($row->customer_address); ?></td> 
                        <td><?php echo e($row->customer_phone); ?></td> 
                        <td><?php echo e($row->customer_city); ?></td>
                        <td><?php echo e($row->customer_email); ?></td> 

                        <td>
                           <?php if($setting->cndition==0): ?>
                          <?php echo e($row->opening_due_no); ?>


                          <?php else: ?>
                          0
                         <?php endif; ?>
                        </td>
                        
                        <td>
                          
                          <?php if($row->customer_status==1): ?>
                           <a href="<?php echo e(URL::to('admin/deactive/'.$row->id)); ?>" class="btn btn-sm btn-success">active</a>

                           <?php else: ?>
                           <a href="<?php echo e(URL::to('admin/active/'.$row->id)); ?>" class="btn btn-sm btn-danger">deactive</a>

                           <?php endif; ?>
                           

                        </td>
                        <td >
                          <?php if($user_role_per->edit == 1): ?>

                             <a  href="<?php echo e(url('admin/customerEdit/'.$row->id)); ?>" class="btn btn-warning btn-sm waves-effect waves-light"> 
                            <i class="fa fa-edit"></i> <span> 
                            Edit
                          </span>
                          </a>
                          <?php endif; ?>

                          <?php if($user_role_per->delete == 1): ?>

                            <a href="<?php echo e(url('admin/customerdlt/'.$row->id)); ?>" class="btn btn-danger btn-sm waves-effect waves-light" id="delete"> X
                            <i class="fa fa-delete"></i> <span> 
                           Delete 
                          </span>
                          </a> 

                          <?php endif; ?>
                        
                            
                         
                          

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
   

  <?php echo $__env->make('expert.copyright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('js'); ?>
    <script>
    $(document).ready(function() {
        dataTableLoad({
            curUrl: "<?php echo e(route('Admin.userrole.index')); ?>",
            addUrl: "<?php echo e(route('Admin.userrole.create')); ?>"
        });
    });
    </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('expert.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\Cosmo_luxary_sanitary_ware\Cosmo_luxary_sanitary_ware\resources\views/admin/customer/customerdetails.blade.php ENDPATH**/ ?>