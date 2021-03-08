<?php $__env->startSection('title', 'Productdetails Manage - '.$settingsinfo->company_name.' - '.$settingsinfo->soft_name.''); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('expert.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('expert.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <i class="fa fa-user-circle"></i><span> Product Manage</span>
            </div>

            <div class="card">
            <div class="card-header">

              <div style="display:inline-block; padding-top:5px;">
                <i class="fa fa-table"></i> Product details List
              </div> 

              <div style="display:inline-block;float: right; padding-top:5px;">
                <a href="<?php echo e(url('admin/productdetailsadd')); ?>" class="btn btn-dark">+add new product</a>
              </div> 

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th>Product Type</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Specification</th>
                        <th>Unit of measurement</th>
                        <th>Grade</th>
                        <th>Unit Price</th>
                        <th>Date</th>
                        
                        <th width="8%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $i=1; ?>
                  <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($row->product_type); ?></td>
                        <td><?php echo e($row->product_code); ?></td>  
                        <td><?php echo e($row->product_name); ?></td>
                        <td><?php echo e($row->product_specification); ?></td> 
                        
                        <td><?php echo e($row->unit_mesurement); ?></td>
                        <td><?php echo e($row->grade); ?></td> 
                        <td><?php echo e($row->unit_price); ?></td>
                        <td><?php echo e($row->date); ?></td> 
                        <td>
                          

                            <a href="<?php echo e(url('admin/productEdit/'.$row->id)); ?>" class="btn btn-warning btn-sm waves-effect waves-light"> 
                            <i class="fa fa-print"></i> <span> 
                            Edit
                          </span>
                          </a>

                            <a href="<?php echo e(url('admin/productdelete/'.$row->id)); ?>" class="btn btn-danger btn-sm waves-effect waves-light" id="delete"> 
                            <i class="fa fa-clipboard"></i> <span> 
                           Delete 
                          </span>
                          </a> 
                        
                          
                         
                          

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
<?php echo $__env->make('expert.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\SERVER\htdocs\AB-Ceramic-Industries\resources\views/admin/product/product_details.blade.php ENDPATH**/ ?>