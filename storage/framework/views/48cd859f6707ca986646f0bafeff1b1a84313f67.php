<?php $__env->startSection('title', 'Merchant Payment Report- '.$settingsinfo->company_name.' - '.$settingsinfo->soft_name.''); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('expert.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('expert.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
        <div class="col-lg-12">
          <div class="card bg-dark">
      		<div class="card-header border-0 bg-transparent text-white">
                <i class="fa fa-list"></i><span> Merchant Payment Report </span>
            </div>

            <div class="card">
            <div class="card-header">
              
              <?php if (session('message')): ?>
        <div class="col-lg-12">
            <div class="alert alert-<?php echo e(session('class')); ?> alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <div class="alert-icon contrast-alert"><i class="icon-close"></i></div>
              <div class="alert-message"><span><?php echo e(session('message')); ?></span></div>
            </div>
        </div>
        <?php endif; ?>

              <form action="<?php echo e(url('admin/medicinereturnbillview')); ?>" method="post">
              <?php echo csrf_field(); ?>


              <div class="row">

                <div class="col-md-6">         
                  <div class="form-group" style="margin-bottom: 0rem;">
                    
                    <select type="text" class="form-control" id="bil_id" name="bil_id" required="">
                        <option value="">Select Bill ID</option>
 
                        <?php $__currentLoopData = $bill_manage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($data->bill_id); ?>"><?php echo e($data->bill_id); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                    
                  </div>
                </div>


                <div class="col-md-6">         
                  <div class="form-group pull-right" style="margin-bottom: 0rem;">
             
                    <button type="submit" class="btn btn-gradient-orange waves-effect waves-light m-1" style="margin-top: 0px !important;">
                      View 
                    </button>
                  </div>
                </div>

              </form>
            </div>
            </div>
          
            
            <div class="card-body">

            
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
            curUrl: "<?php echo e(route('Admin.usermanage.index')); ?>",
            //dataUrl: "<?php echo e(route('Admin.usermanage.index')); ?>",
            addUrl: "<?php echo e(route('Admin.usermanage.index')); ?>"
        });
    });

    $(document).ready(function() {
      $("#bil_id").select2();
    });
    </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('expert.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\server\htdocs\SOFTWARES\HOSPITAL-MANAGEMENT-SYSTEM\resources\views/admin/pharmacysell/medicinereturn.blade.php ENDPATH**/ ?>